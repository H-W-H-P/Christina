<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<? 

function isUserPassword($userId, $password)
{
    $userData = CUser::GetByID($userId)->Fetch();

    $salt = substr($userData['PASSWORD'], 0, (strlen($userData['PASSWORD']) - 32));

    $realPassword = substr($userData['PASSWORD'], -32);
    $password = md5($salt.$password);

    return ($password == $realPassword);
}

global $USER;
$user = new CUser;
if(isUserPassword($USER->GetID(), $_POST['passold'])){
	$fields = Array(
			"LOGIN"             => $USER->GetLogin(),
			"ACTIVE"            => "Y",
			"PASSWORD"          => $_POST['passone'],
			"CONFIRM_PASSWORD"  => $_POST['passtwo'],
	);
	$user->Update($USER->GetID(), $fields);
	if($user->LAST_ERROR){
		echo $user->LAST_ERROR;
	}
	else{
		echo "Пароль успешно изменен";
	}
}
else{
	echo "Неверный старый пароль";
	
}
	
?>
<script>
		$( document ).ready(function() {
			$('#sub-pass').click(function(){
			    var submit = true; 
			    var pass0 = $('#form-pass .pass0');
			    var pass1 = $('#form-pass .pass1');
			    var pass2 = $('#form-pass .pass2');
			    
			    if(pass0.val()==''){
			    	pass0.parent().addClass('error'); 
			        submit = false; 
			    }
			   	else{
			    	pass0.parent().removeClass('error');
			    } 

			    if(pass1.val()==''){
			    	pass1.parent().addClass('error'); 
			        submit = false; 
			    }
			   	else{
			    	pass1.removeClass('error');
			    }
			    if(pass2.val()==''){
					pass2.parent().addClass('error'); 
			        submit = false; 
			    }
				else{
					pass2.parent().removeClass('error');
			    }
			                
			    if(submit){
			        $('#res-pass').load('/include/pass.php',$('#form-pass').serializeArray());
			    }
			    return false;
			});
		});
		</script>