<?php

//        phpinfo();exit();
        $word = new COM("word.application") or die("Can't start Word!");
        // 显示目前正在使用的Word的版本号
//        echo "Loading Word, v. {$word->Version}";exit();
        // 把它的可见性设置为0（假），如果要使它在最前端打开，使用1（真）
        // to open the application in the forefront, use 1 (true)
        //$word->Visible = 0;
//echo $_SERVER['DOCUMENT_ROOT']."/Uploads/2016-11-22/583407b711c.doc";exit();
        //打?一个文档
        $word->Documents->OPen($_FILES['file']['tmp_name']);
        //读取文档内容
        $text= $word->ActiveDocument->content->Text;
        $str = str_replace('', '', str_replace('', '', str_replace('', '', nl2br($text))));
        echo $str;exit();
        echo "";
        //将文档中需要换的变量更换一下
        $test=str_replace("<{变量}>","这是变量",$test);
        echo $test;
        $word->Documents->Add();
        // 在新文档中添加文字
        $word->Selection->TypeText("$test");
        //把文档保存在目录中
        $word->Documents[1]->SaveAs("2.doc");
        // 关闭与COM组件之间的连接
        $word->Quit();

    echo 333;exit();
    $file_path = $_FILES['file']['tmp_name'];
     $wordObj = $word = new \COM("word.application", null, CP_UTF8);
     $word->Documents->OPen($relPath);
      $text = strip_tags($word->ActiveDocument->content->Text);
      echo $text;exit();
     echo realpath($file_path);exit();
    docToMht($_FILES['file']['tmp_name']);exit();
