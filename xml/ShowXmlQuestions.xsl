<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE xsl:stylesheet>
<xsl:stylesheet xsl:version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" >

<xsl:template match="/">
  <HTML> <BODY> <P>COMO TRANSFORMAR XML EN UNA TABLA
  HTML</P>
  <TABLE border="1">
  <THEAD>
  <TR> <TH>Autor</TH> <TH>Enunciado</TH> <TH>Respuesta Correcta</TH> <TH>Respuestas Incorrectas</TH> <TH>Tema</TH> </TR>
  </THEAD>
  <xsl:for-each select="/assessmentItems/assessmentItem" >
  <TR>
  <TD>
  <FONT SIZE="2" COLOR="black" FACE="Verdana">
  <xsl:value-of select="/@author" /> <BR/>
  </FONT>
  </TD>
  <TD>
  <FONT SIZE="2" COLOR="blue" FACE="Verdana">
  <xsl:value-of select="itemBody/p"/> <BR/>
  </FONT>
  </TD>
  <TD>
  <FONT SIZE="2" COLOR="blue" FACE="Verdana">
  <xsl:value-of select="correctResponse"/> <BR/>
  </FONT>
  </TD>
  <TD>
  <FONT SIZE="2" COLOR="blue" FACE="Verdana">
  <xsl:value-of select="correctResponse"/> <BR/>
  </FONT>
  </TD>
  <TD>
  <FONT SIZE="2" COLOR="blue" FACE="Verdana">
  <xsl:value-of select="correctResponse"/> <BR/>
  </FONT>
  </TD>
  </TR>
  </xsl:for-each>
  </TABLE>
  </BODY>
  </HTML>
  </xsl:template>
  </xsl:stylesheet>
