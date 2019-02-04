<?php

interface Check{
        public function check_login()
                {
                    $link=mysqli_connect("localhost", "root", "", "parser_test");

                    if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
                    {   
                        $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
                        $userdata = mysqli_fetch_assoc($query);

                        if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id']))
                        {
                            setcookie("id", "", time() - 3600*24*30*12, "/");
                            setcookie("hash", "", time() - 3600*24*30*12, "/");
                            return "BadHash";
                        }
                        else
                        {
                            return "OK";
                        }
                    }

                    else
                    {
                        return "BadCookies";
                    }
                }
            }
?>