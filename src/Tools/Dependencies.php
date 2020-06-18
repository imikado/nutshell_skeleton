<?php

namespace My\Tools;

class Dependencies extends \Nutshell\Abstracts\Dependencies implements \My\Interfaces\Dependencies
{
    public function getMainSgbd()
    {
        $options = array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_CASE => \PDO::CASE_NATURAL
        );

        $config = $this->getConfig('db');
        return new \Nutshell\Sgbd\Pdo('maBase', $config['maBaseMysql.dsn'], $config['maBaseMysql.username'], $config['maBaseMysql.password'], $options);
    }

}
