<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <?php
        $xslDoc = new DOMDocument();
        $style = simplexml_load_file( "../xml/ShowXmlQuestions.xsl" );
        $xslDoc->load($style);
        $xmlDoc = new DOMDocument();
        $info = simplexml_load_file( "../xml/Questions.xml" );
        $xmlDoc->load($info);
        $proc = new XSLTProcessor();
        $proc->importStyleSheet($xslDoc);
        echo $proc->transformToXML($xmlDoc);
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
