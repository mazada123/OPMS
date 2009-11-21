<?php
require_once 'System.php';
require_once 'PHPUnit.php';
require_once 'File/Passwd/Common.php';

$tmpfile = System::mktemp();

/**
 * TestCase for File_Passwd_CommonTest class
 * Generated by PHPEdit.XUnit Plugin
 * 
 */
class File_Passwd_CommonTest extends PHPUnit_TestCase{

    var $pwd;

    /**
     * Constructor
     * @param string $name The name of the test.
     * @access protected
     */
    function File_Passwd_CommonTest($name){
        $this->PHPUnit_TestCase($name);
    }
    
    /**
     * Called before the test functions will be executed this function is defined in PHPUnit_TestCase and overwritten here
     * @access protected
     */
    function setUp(){
        $this->pwd = &new File_Passwd_Common();
    }
    
    /**
     * Called after the test functions are executed this function is defined in PHPUnit_TestCase and overwritten here
     * @access protected
     */
    function tearDown(){
        $this->pwd = null;
    }
    
    /**
     * Regression test for File_Passwd_Common.parse method
     * @access public
     */
    function testparse(){
        $this->assertTrue(PEAR::isError($this->pwd->parse()));
    }
    
    /**
     * Regression test for File_Passwd_Common.save method
     * @access public
     */
    function testsave(){
        $this->assertTrue(PEAR::isError($this->pwd->save()));
    }
    
    /**
     * Regression test for File_Passwd_Common.load method
     * @access public
     */
    function testload(){
        $array = array('1stLine', '2ndLine', '3rdLine');
        $this->pwd->setFile('common.txt');
        $this->pwd->load();
        $this->assertEquals($array, $this->pwd->_contents);
    }
    
    /**
     * Regression test for File_Passwd_Common.setFile method
     * @access public
     */
    function testsetFile(){
        $this->pwd->setFile('passwd.file');
        $this->assertEquals('passwd.file', $this->pwd->getFile());
    }
    
    /**
     * Regression test for File_Passwd_Common.getFile method
     * @access public
     */
    function testgetFile(){
        $this->pwd->setFile('passwd.file');
        $this->assertEquals('passwd.file', $this->pwd->getFile());
    }
    
    /**
     * Regression test for File_Passwd_Common.userExists method
     * @access public
     */
    function testuserExists(){
        $this->pwd->_users = array('mike' => array());
        $this->assertTrue($this->pwd->userExists('mike'));
    }
    
    /**
     * Regression test for File_Passwd_Common.delUser method
     * @access public
     */
    function testdelUser(){
        $this->pwd->_users = array('mike' => array('nothing'));
        $this->assertTrue($this->pwd->delUser('mike'));
    }
    
    /**
     * Regression test for File_Passwd_Common.listUser method
     * @access public
     */
    function testlistUser(){
        $array = array('mike' => array('nothing'));
        $this->pwd->_users = $array;
        $this->assertEquals($array, $this->pwd->listUser());
        $this->assertEquals(array('nothing'), $this->pwd->listUser('mike'));
    }
    
    function test_auth(){
        $this->assertTrue('1stLine' === File_Passwd_Common::_auth('common.txt', '1stLine'));
        $this->assertFalse(File_Passwd_Common::_auth('common.txt', 'nonexist'));
    }
}

?>