<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

</head>
<body>
	<table cellpadding="0" cellspacing="0" style="width:800px; margin:25px 0;">
    	<tr>
        	<td><img src="http://lac.com.uy/images/logo-mail.jpg"  style="margin-bottom:20px;" alt="LAC"/></td>
        </tr>
        <tr>
        	<td style="font-size:12px; padding:5px 0 5px 0; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#353535; fext-align:left">Ud ha sido contactado por <span style="color:#a12457"><?php echo $name;?></span></td>
        </tr>
       <tr>
        	<td style="font-size:12px; padding:5px 0 5px 0; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#353535; fext-align:left">Su mensaje es el siguiente: <span style="color:#a12457"><?php echo $comments;?></span></td>
        </tr>        
       <tr>
        	<td style="font-size:12px; padding:5px 0 5px 0; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#353535; text-align:left">Ud puede contactarse con <span style="color:#a12457"><?php echo $name;?></span> via email a <span style="color:#a12457"><?php echo $email;?><?php if(trim($telefono) != ''): ?></span> o via telefónica a <span style="color:#a12457"><?php echo $telefono;?></span><?php endif;?></td>
        </tr>
        <tr>
            <td style="font-size:12px; padding:5px 0 5px 0; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#353535; fext-align:left">La persona <span style="color:#a12457"><?php if($newsletter): ?>QUIERE <?php else: ?>NO quiere <?php endif;?></span> recibir newsletter</td>
        </tr>
    </table>
</body>
</html>

