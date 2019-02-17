<?php
namespace JustusParser\models;

use JustusParser\core\Model;
use PDO;

require 'includes/simple_html_dom.php';
require 'includes/curl_query.php';

class Model_Main extends Model
{

    public function getData()
    {       
        $html = curl_get('http://www.gismeteo.ua/city/daily/5093/');
        $dom = str_get_html($html);
            $data['atemp'] = $dom->find('dd.value.m_temp.c', 0);
            $data['wtr'] = $dom->find('td', 2);
            $data['wnd'] = $dom->find('dd.value.m_wind.ms', 0);
            $data['prs'] = $dom->find('dd.value.m_press.torr', 0);
            $data['hum'] = $dom->find('div.wicon.hum', 0);
            $data['wtemp'] = $dom->find('dd.value.m_temp.c', 1);
        return $data;
    }

        public function checkLogin()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=parser_test', 'root', '');
        }
        catch (PDOException $e) {
            echo "Unable to connect to the database";
        }

        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {   

            $query = $pdo->prepare("SELECT * FROM users1 WHERE user_id = :user_id LIMIT 1");
            $query->execute(['user_id' => intval($_COOKIE['id'])]);
            $userdata = $query->fetch(PDO::FETCH_ASSOC);

            if (($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])) {
                setcookie("id", "", time() - 3600*24*30*12, "/");
                setcookie("name", "", time() - 3600*24*30*12, "/");
                setcookie("hash", "", time() - 3600*24*30*12, "/");
                return "BadHash";
            } else {
                return "OK";
            }
            
        } else {
            return "BadCookies";
        }
    }
}
