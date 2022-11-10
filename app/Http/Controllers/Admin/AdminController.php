<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller 
{
    private $content = "";

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
                <label for=\"category\">Category</label>
                <select name=\"category_id\" id=\"category\">
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
                                foreach($default_value as $item2) {
                                    if($item1->id == $item2->id) {                                        
                                        $res .= "selected ";
                                    }
                                }
        
                                $res .= "value=\" $item->id \">";
                                $res .= $item->title;
                            $res .= "</option>
                ";
                            }
                    $res .= "
                </select>
            </div>";
                    break;
                
                default:
                    # code...
                    break;
        }
        return $res;
    }

    private function addContent($content) {
        $this->content .= $content;
    }

    private function getContent() {
        return $this->content;
    }

    protected function getEditForm($postid, $arrControlls) {
        $this->addContent($this->getHeader($postid));

        foreach($arrControlls as $controll) {
            $this->addContent($this->getControl($controll));
        }

        $this->addContent($this->getFooter());
        return $this->getContent();
    }
    
    private function getHeader($postid) {
        return "<div class=\"admin-edit\">
    <form action=\"".route('admin.post.update', $postid)."\" method=\"POST\">
        @csrf
        @method('patch')";
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