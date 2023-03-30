<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    private $res;
    protected function getEditForm($elid, $route, $arrControls) {
        $this->res = (object)[];

        $this->res->route = route($route, $elid);

        $this->res->multipart = false;
        foreach ($arrControls as $control) if ($control[0] == 'file') $this->res->multipart = true;

        foreach ($arrControls as $arrControl) {

            if($arrControl[0] == 'select') {
                if ($arrControl[2] instanceof \Illuminate\Database\Eloquent\Collection) {
                    foreach ($arrControl[2] as &$value) {
                        if ($value->id == $arrControl[4]) {
                            $value->selected = true;
                        }
                    }
                }
            }
            if($arrControl[0] == 'select_multiple') {
                if ($arrControl[2] instanceof \Illuminate\Database\Eloquent\Collection) {
                    foreach ($arrControl[2] as &$value) {

                        foreach ($arrControl[4] as $sValue){
                            if ($value->id == $sValue->id) {
                                $value->selected = true;
                            }
                        }

                    }
                }
            }

            $control = (object)[];
            $control->type = $arrControl[0];
            $control->code = $arrControl[1];
            $control->value = $arrControl[2];
            $control->name = $arrControl[3];
            $control->default_value = $arrControl[4] ?? '';

            $this->res->controls[] = $control;
        }

        return $this->res;
    }

}
