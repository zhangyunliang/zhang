<?php
/**
 * PHP SDK for QQ��¼ OpenAPI
 *
 * @version 1.3
 * @author connect@qq.com
 * @copyright ? 2011, Tencent Corporation. All rights reserved.
 */

/**
 * @brief ���ļ���������session����
 *        �Խ������ͬ�������¹���session���Լ���ͬһ����������ͬ������֮�乲��session�������⡣
 *        ʹ��ǰ������ĵġ��޸ĵ㡱����˵�������޸�
 */


/**
 * �޸ĵ�1��ʹ��ǰ���봴�����ݿ����������MySQL�д���tbl_session���ʾ��
 *
 * CREATE TABLE `tbl_session` (
 *     `session_id` varchar(255) binary NOT NULL default '',
 *     `session_expires` int(10) unsigned NOT NULL default '0',
 *     `session_data` text,
 *     PRIMARY KEY  (`session_id`)
 *    ) ENGINE=MyISAM;
 */


/**
 * @brief ʵ���Զ���session�Ĵ򿪣��رգ���ȡ��д�룬���٣��������յȹ��̡�
 *
 * �޸ĵ�2�����������Ҫָ���ı���ֵ����ָ��
 */
class Session 
{
    //mysql��������ַ����Ҫ������ָ��ip��ַ 
    const db_host = "dbhost"; 

    //���ݿ��û�������Ҫ������ָ���Լ����û���
    const db_user = "dbuser";   

    //���ݿ����룬��Ҫ������ָ���Լ��Ŀ�ݿ�����
    const db_pwd = "dbpwd"; 

    //���ݿ⣬��Ҫ������ָ�����ݿ�
    const db_name = "dbname";      

    //���ݿ����Ҫ������ָ�����ݱ�
    const db_table = "dbtable"; 

    //mysql-handle
    private $db_handle;

    //session-lifetime
    private $lifeTime;

    function open($savePath, $sessName) 
    {
        // get session-lifetime
        $this->lifeTime = get_cfg_var("session.gc_maxlifetime");

        // open database-connection
        $db_handle = @mysql_connect(self::db_host, self::db_user, self::db_pwd);

        $dbSel = @mysql_select_db(self::db_name, $db_handle);

        // return success
        if(!$db_handle || !$dbSel)
            return false;

        $this->db_handle = $db_handle;
        return true;
    }

    function close() 
    {
        $this->gc(ini_get('session.gc_maxlifetime'));
        // close database-connection
        return @mysql_close($this->db_handle);
    }

    function read($sessID) 
    {
        // fetch session-data
        $res = @mysql_query("SELECT session_data AS d FROM ".self::db_table." 
            WHERE session_id = '$sessID'
            AND session_expires > ".time(), $this->db_handle);

        // return data or an empty string at failure
        if($row = @mysql_fetch_assoc($res))
            return $row['d'];

        return "";
    }

    function write($sessID, $sessData) 
    {
        // new session-expire-time
        $newExp = time() + $this->lifeTime;

        // is a session with this id in the database?
        $res = @mysql_query("SELECT * FROM ".self::db_table." 
            WHERE session_id = '$sessID'", $this->db_handle);

        // if yes,
        if(mysql_num_rows($res)) 
        {
            // ...update session-data
            @mysql_query("UPDATE ".self::db_table." 
                SET session_expires = '$newExp',
                session_data = '$sessData'
                WHERE session_id = '$sessID'", $this->db_handle);

            // if something happened, return true
            if(@mysql_affected_rows($this->db_handle))
                return true;
        }
        else // if no session-data was found,
        {
            // create a new row
            @mysql_query("INSERT INTO ".self::db_table." (
                session_id,
                session_expires,
                session_data)
                VALUES(
                    '$sessID',
                    '$newExp',
                    '$sessData')", $this->db_handle);
            // if row was created, return true
            if(@mysql_affected_rows($this->db_handle))
                return true;
        }

        // an unknown error occured
        return false;
    }

    function destroy($sessID) 
    {
        // delete session-data
        @mysql_query("DELETE FROM ".self::db_table." WHERE session_id = '$sessID'", $this->db_handle);

        // if session was deleted, return true,
        if(@mysql_affected_rows($this->db_handle))
            return true;

        // ...else return false
        return false;
    }

    function gc($sessMaxLifeTime) 
    {
        // delete old sessions
        @mysql_query("DELETE FROM ".self::db_table." WHERE session_expires < ".time(), $this->db_handle);

        // return affected rows
        return @mysql_affected_rows($this->db_handle);
    }
}

/**
 * @brief ָ��session��Ч������
 *
 * �޸ĵ�3��ʹ��ǰ���뽫�����.domain.com�޸�Ϊ��վ�������������磺 .qq.com��,��ע��ǰ�����һ��'.'
 */
//define("MAIN_DOMAIN", ".domain.com");   



/**
 * @brief ��ͬ�������¹���session��Ϣ
 *
 * �޸ĵ�4��ʹ��ǰ���뽫�����false�޸�Ϊtrue
 * COOKIE_DOMAIN = false ��ʾ����ֹ�ù��ܣ�Ĭ�Ͻ�ֹ��
 * COOKIE_DOMAIN = true  ��ʾ�����øù��ܣ�����ǰ�᣺��Ҫ����MAIN_DOMAIN������
 */
define("COOKIE_DOMAIN", false); 
if (defined("COOKIE_DOMAIN") && COOKIE_DOMAIN)
{
    if (defined("MAIN_DOMAIN"))
        @ini_set("session.cookie_domain", MAIN_DOMAIN);
}



/**
 * @brief ͬһ������������ͬ������֮�乲��session��Ϣ
 *
 * �޸ĵ�5��ʹ��ǰ���뽫�����false�޸�Ϊtrue
 * COOKIE_DOMAIN = false ��ʾ����ֹ�ù��ܣ�Ĭ�Ͻ�ֹ��
 * COOKIE_DOMAIN = true  ��ʾ�����øù��ܣ�����ǰ�᣺��Ҫ����mysql���ݱ�
 */
define("USER_SESSION", false);
if (defined("USER_SESSION") && USER_SESSION)
{
    @ini_set("session.save_handler", "user");
    $session = new Session;
    @session_module_name("user");
    @session_set_save_handler(
        array(&$session, "open"),
        array(&$session, "close"),
        array(&$session, "read"),
        array(&$session, "write"),
        array(&$session, "destroy"),
        array(&$session, "gc"));
}

@session_start();
?>
