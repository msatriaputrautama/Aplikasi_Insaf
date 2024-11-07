<?php
class Login_model extends CI_Model
{

  private $ldap_connection;

  // public function __construct()
  // {
  //   parent::__construct();
  //   $this->ldap_connection = ldap_connect($this->config->item('ldap_host'), $this->config->item('ldap_port'));
  //   ldap_set_option($this->ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3);
  //   ldap_set_option($this->ldap_connection, LDAP_OPT_REFERRALS, 0);
  // }

  // public function login($username, $password)
  // {
  //   $ldap_bind_dn = $this->config->item('ldap_user_dn') . $username . ',' . $this->config->item('ldap_base_dn');
  //   if (@ldap_bind($this->ldap_connection, $ldap_bind_dn, $password)) {
  //     $filter = sprintf($this->config->item('ldap_search_filter'), $username);
  //     $result = ldap_search($this->ldap_connection, $this->config->item('ldap_base_dn'), $filter);
  //     $entries = ldap_get_entries($this->ldap_connection, $result);
  //     if ($entries['count'] > 0) {
  //       return $entries[0];
  //     }
  //   }
  //   return false;
  // }

  function validate($username, $password)
  {
    $local = $this->load->database('local', TRUE);
    $local->where('username', $username);
    $local->where('password', $password);
    $result = $local->get('user', 1);
    return $result;
  }
}
