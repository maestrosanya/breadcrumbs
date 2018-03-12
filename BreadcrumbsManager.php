<?php

namespace Maestro\MaestroAdmin\App\Components\Breadcrumbs;


use Illuminate\Support\Collection;

class BreadcrumbsManager
{

    public $names = [];

    public $callback = [];

    public $name = [];

    public $config;

    public $view;

    public $breadcrumbs;


    public function __construct()
    {
        require __DIR__ . '/BreadcrumbsList.php';

    }

    public function register($name, $callback)
    {
        if (isset($this->callback[$name])) {
            throw new \Exception('Breadcrumbs: route "'. $name .'" already exists');
        }

        $this->callback[$name] = $callback;

        $this->name = $name;

    }

    static public function __callStatic($name, $arguments)
    {
        
    }

    /*static public function Breadcrumbs($name, $params = [])
    {
       // self::getRegister($params);

        $id = 2;
        //require __DIR__ . '/BreadcrumbsList.php';
    }*/

    public function start()
    {

        //$this->callback['home'];
    }

    static function getRegister($params)
    {
        $id = 2;
       //return require __DIR__ . '/BreadcrumbsList.php';
    }

    public function setName()
    {
        //self::$names[] = require __DIR__ . '/BreadcrumbsList.php';

        //dd(self::$names);
    }

    public function startCallback($name, $params = [])
    {
        $this->names[$name] = $this->callback[$name]($this, $params);
        return $this->names;
    }

    public function hasRoute($name)
    {
        return isset($this->callback[$name]) ? true : false;
    }

    /*static public function renderAdmin($name, $params =[])
    {
        call_user_func(['Breadcrumbs', 'render'], $name, $params);
    }*/

    public function renderAdmin($name, $params = '')
    {

        $this->breadcrumbs = array_reverse($this->call($name, $params));

        $view = view('admin::component.breadcrumbs')->with('breadcrumbs', $this->breadcrumbs)->render();

        if ($view) {
            return $view;
        }
        return null;
    }

    public function call($name, $params = '')
    {
        $breadcrumbsCount = count($this->callback);

        $arrCrumb = [];
        for ($i = 0; $i < $breadcrumbsCount; $i++) {
            
            if (isset($this->callback[$name])) {

                $this->startCallback($name, $params);

                $arrCrumb[$name]['title'] = $this->names[$name]['title'];
                $arrCrumb[$name]['url'] = $this->names[$name]['url'];

                $name = $this->names[$name]['parent'];
            }

        }

        return $arrCrumb;

       // dd($this->names);
       // dd($this->name);
    }

    public function getList()
    {

    }
    
    public function push($routeName, $route, $parentRouteName = '')
    {
        $arr = [
            'title' => $routeName,
            'url' => $route,
            'parent' => $parentRouteName
        ];

        return $arr;
    }

}
