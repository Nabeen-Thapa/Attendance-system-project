<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#stdphone').keyup(function(){
                var contact = $(this).val();
                // ajax call
                $.ajax('registered_phone.php',{
                    data:{'stdphone':contact},
                    dataType:'text',
                    method:'post',
                    success:function(response){
                        $('#std_reg_phone_err').html(response);
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#stdemail').keyup(function(){
                var email = $(this).val();
                // ajax call
                $.ajax('registered_email.php',{
                    data:{'stdemail':email},
                    dataType:'text',
                    method:'post',
                    success:function(response){
                        $('#std_reg_email_err').html(response);
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#regno').keyup(function(){
                var register = $(this).val();
                // ajax call
                $.ajax('registered_reg_no.php',{
                    data:{'regno':register},
                    dataType:'text',
                    method:'post',
                    success:function(response){
                        $('#std_reg_regno_err').html(response);
                    }
                });
            });
        });
    </script>