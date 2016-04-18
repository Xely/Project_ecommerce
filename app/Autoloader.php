<?php
namespace App;


/**
 * Class Autoloader
 * @package App
 */
class Autoloader
{
    /**
     * Includes the file corresponding to the class
     * @param $class
     */
    static function autoload($class)
    {
//        var_dump($class);
//        if (strpos($class, __NAMESPACE__ . '\\') == 0) {
//            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
//            $class = str_replace('\\', '/', $class);
//
//            var_dump($class);
//            require $_SERVER['DOCUMENT_ROOT'] . $class . '.php';
//        }
//        $flag = 0;
//        if ($class === 'App\Table\Table') {
//            $flag = 1;
//        }

        $parts = preg_split('#\\\#', $class);

        // on extrait le dernier element
        $className = array_pop($parts);

        // on créé le chemin vers la classe
        // on utilise DS car plus propre et meilleure portabilité entre les différents systèmes (windows/linux)

        $path = implode(DS, $parts);
        $file = $className.'.php';

        $filepath = ROOT.strtolower($path).DS.$file;

//        if ($flag) {$filepath = ROOT . 'core\Table\Table.php'; }

        // var_dump($filepath); => C:\xampp\htdocs\Labs\Eloyas\app\tester\Test.php
        //
        require_once $filepath;

    }

    /**
     * Saves the Autoloader
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
}