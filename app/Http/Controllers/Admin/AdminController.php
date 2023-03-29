<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    private $content = [];
    private $route = '';

    private function getControl($arParams) {

        $type = $arParams[0];
        $code = $arParams[1];
        $value = $arParams[2];
        $name = $arParams[3];
        if(isset($arParams[4])) $default_value = $arParams[4];

        $res = "";
        switch ($type) {
            case 'text':
                if(empty($value) && !empty($default_value)) $value = $default_value;
                $res = "
            <div class=\"admin-edit__form-control\">
                <label for=\"". $code ."\">". $name ."</label>
                <input name=\"". $code ."\" id=\"".$code."\" type=\"text\" value=\"". $value ."\">
            </div>";
                break;

            case 'textarea':
                $res = "
            <div class=\"admin-edit__form-control\">
                <label for=\"". $code ."\">". $name ."</label>
                <textarea name=\"". $code ."\" id=\"". $code ."\">". $value ."</textarea>
            </div>";
                break;

            case 'select':
                    $res = "
            <div class=\"admin-edit__form-control\">
                <label for=\"". $code ."\">". $name ."</label>
                <select name=\"". $code ."\" id=\"". $code ."\">
                ";
                        foreach ($value as $item) {
                            $res .= "    <option ";
                                if($item->id == $default_value) $res .= "selected ";
                                $res .= "value=\"". $item->id ."\">";
                                $res .= $item->title;
                            $res .= "</option>
                ";
                        }
                    $res .= "
                </select>
            </div>";
                    break;

            case 'select_multiple':
                    $res = "
            <div class=\"admin-edit__form-control\">
                <label for=\"". $code ."\">". $name ."</label>
                <select multiple name=\"". $code ."\" id=\"". $code ."\">
                ";
                        foreach ($value as $item1) {
                            $res .= "    <option ";
                                if($default_value){
                                    foreach($default_value as $item2) {
                                        if($item1->id == $item2->id) {
                                            $res .= "selected ";
                                        }
                                    }
                                }

                                $res .= "value=\" $item1->id \">";
                                $res .= $item1->title;
                            $res .= "</option>
                ";
                            }
                    $res .= "
                </select>
            </div>";
                    break;

            case 'file':
                $res = "
            <div class=\"admin-edit__form-control\">
                <label for=\"". $code ."\">". $name ."</label>
                <input type=\"file\" name=\"". $code ."\" id=\"". $code ."\">". $value ."</input>
            </div>";
                break;

                default:
                    # code...
                    break;
        }
        return $res;
    }

    private function addContent($position, $content) {
        if(isset($this->content[$position]))
            $this->content[$position] .= $content;
        else
            $this->content[$position] = $content;
    }

    private function getContent() {
        return $this->content;
    }

    protected function getEditForm($postid, $route, $arrControlls) {
        $this->route = $route;

        $multipart = '';
        foreach ($arrControlls as $control) {
            if ($control[0] == 'file') $multipart = "enctype=\"multipart/form-data\"";
        }
        $this->addContent('top',$this->getHeader($postid, $multipart));

        foreach($arrControlls as $controll) {
            $this->addContent('bottom',$this->getControl($controll));
        }

        $this->addContent('bottom',$this->getFooter());
        return $this->getContent();
    }

    private function getHeader($postid, $multipart) {
        return "<div class=\"admin-edit\">
    <form ".$multipart." action=\"".route($this->route, $postid)."\" method=\"POST\">";
    }

    private function getFooter() {
        return "
        <div>
            <input class=\"admin-edit__save\" type=\"submit\" value=\"Сохранить\">
        </div>
    </form>
</div>";
    }
}
