
    var border="1px solid #c4c4c4";
    var errorBorder="1px solid #e80000";
    let fnamePass=lnamePass=mobilePass=emailPass=pcPass=inqPass=false;

//Helper Functions
  
function appendError($errorId, $customError, $input, $error, $wrapper){
    if($errorId.length===0)
    $error.append($customError);
    $input.css("border",errorBorder);
    $wrapper.removeClass("nf-pass");
}

function removeError($errorId,$input){
    $errorId.remove();
    $input.css("border",border);

}

function validateName($input,$error,$wrapper, $errorId , $errorMsg) {

    if($errorId==="#fname-error"){
        fnamePass=false;
    }
    else if($errorId==="#lname-error"){
        lnamePass=false;
    }

    var letters = /^[A-Za-z]+$/;
    
    $input.focusout(function(){
        if($input.val().length != 0 && $input.val().length<3)
        {
            appendError($($errorId),$errorMsg,$input,$error,$wrapper); 
        }
        else 
        {
            removeError($($errorId),$input);
        }
        });
    if($input.val().length>30 || ($input.val().length>0 && !$input.val().match(letters) ) )
    {
        appendError($($errorId),$errorMsg,$input,$error,$wrapper); 
    }
    else 
    {
        removeError($($errorId),$input);
    }
    if($input.val().length<30 && ($input.val().length != 0 &&( $input.val().match(letters) && $input.val().length>=3)))
    {
        removeError($($errorId),$input); 
    }
    if($input.val().length==0){
        $wrapper.removeClass('nf-pass');
        
    }
    if($input.val().length<=30 &&( $input.val().match(letters) && $input.val().length>=3)){
        $wrapper.addClass("nf-pass");

        if($errorId=="#fname-error"){
            fnamePass=true;
        }
        else if($errorId=="#lname-error"){
            lnamePass=true;
        }
    }else{
        $wrapper.removeClass("nf-pass");

        if($errorId=="#fname-error"){
            fnamePass=false;
        }
        else if($errorId=="#lname-error"){
            lnamePass=false;
        }
    }

}


  
    
$(document).ready(function () {
    
    
    //FIRST NAME
    $("#nf-field-5").live("change focus keyup paste click cut input keydown keypress delete", function(){
        $errorMsg="<div class='nf-error-msg custom-error' id='fname-error'>Please enter letters only min of 3 letters and max of 30 letters.</div>";
        
        validateName($("#nf-field-5"),$("#nf-error-5"), $("#nf-field-5-wrap"),"#fname-error",$errorMsg);
        submit();
    });


    //LAST NAME
    $("#nf-field-6").live("change keyup paste click cut input keydown keypress delete", function(){

        $errorMsg="<div class='nf-error-msg custom-error' id='lname-error'>Please enter letters only min of 3 letters and max of 30 letters.</div>";
    
        validateName($("#nf-field-6"),$("#nf-error-6"), $("#nf-field-6-wrap"),"#lname-error",$errorMsg);

        submit();
    });
    

    //MOBILE
    $("#nf-field-9").ready(function(){

        var input = document.querySelector("#nf-field-9");

        var iti = window.intlTelInput(input, {
            utilsScript:
                "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js",
                initialCountry: "",
                preferredCountries: [ "eg", "sa" ],
                // separateDialCode: true,
                autoFormat: false,
                autoHideDialCode: false,
                // don't insert international dial codes
                nationalMode: false,
                // number type to use for placeholders
                numberType: "MOBILE",
                // stop the user from typing invalid numbers
                preventInvalidNumbers: true,
                // stop the user from typing invalid dial codes
                preventInvalidDialCodes: true,
                formatOnDisplay: true ,
            
        });
        window.iti = iti;
    
        $("#nf-field-9").live("change click focus keyup keydown paste keypress input focusout ", function(){

            $("#nf-field-9").removeAttr("placeholder");
            document.getElementById("nf-field-9").value = $("#nf-field-9").val().replace(/[^+\d]/g,'');
            let countryCode=$('.iti__active .iti__dial-code').text();

            //Add country code prefix if removed
            if($("#nf-field-9").val().indexOf(countryCode) !=0){
                let mob=$("#nf-field-9").val().replace(/[^+\d]/g,'');
                document.getElementById("nf-field-9").value = countryCode + mob;
            }

            //Prevent delete country code
            $("#nf-field-9").keydown(function(e){

                if(countryCode==$("#nf-field-9").val())
                {   
                    if(e.keyCode===8 || e.which === 8){
                        return false;
                    }
                }

                });

            //Prevent cut and delete country code
            $('#nf-field-9').bind('cut delete',function(e) { 
                if(countryCode==$("#nf-field-9").val()){
                    e.preventDefault();
                }

            });

            //Prevent press eny key except numbers
            $("#nf-field-9").keypress(function(evt){

                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            });
            
            //Validate number
            var mobile=$("#nf-field-9");
            var validNumber=false;
            validNumber=iti.isValidNumber();
            var mobileError="<div class='nf-error-msg custom-error' id='mobile-error'>Please enter valid number.</div>";

            mobile.focusout(function(){
                if( !validNumber && (mobile.val()!="" && mobile.val() != countryCode)){
                    appendError($("#mobile-error"), mobileError, mobile, $("#nf-error-9"), $("#nf-field-9-wrap"));
                    mobilePass=false;
    
                }else
                {
                    removeError($("#mobile-error"),$("#nf-field-9"));
    
                }
            });
            if( validNumber && (mobile.val()!="" && mobile.val() != countryCode)){
                removeError($("#mobile-error"), mobile);

            }
            if( validNumber  && mobile.val() !="" && mobile.val()!=countryCode){
                // console.log('here');
                $("#nf-field-9-wrap").addClass("nf-pass");
                mobilePass=true;
            }else{
                $("#nf-field-9-wrap").removeClass("nf-pass");
                mobilePass=false;
            }
            submit();
            
        });

    });
        
    //EMAIL
    $("#nf-field-10").live("focusout", function(){
        if(!$("#nf-field-10-wrap").hasClass("nf-error") && $("#nf-field-10").val().length !=0){
            $("#nf-field-10-wrap").addClass("nf-pass");
        }
        if($("#nf-field-10-wrap").hasClass("nf-pass")){
            emailPass=true;
        }else{
            emailPass=false;
        }
        if($("#nf-field-10").val().length==0){
            $("#nf-field-10-wrap").removeClass("nf-pass")
        }
        submit();
    });


    //INQUIRY
    $("#nf-field-14").live("change keyup paste click cut paste focus keypress delete input keydown ", function(e){

        var inquiryError="<div class='nf-error-msg custom-error' id='inquiry-error'>You have reached the limit of 1000 characters.</div>";
        inqPass=false;

        if($("#nf-field-14").val().length>1000)
        {
            appendError($("#inquiry-error"), inquiryError, $("#nf-field-14"), $("#nf-error-14"), $("#nf-field-14-wrap"));
        }
        else 
        {
            removeError($("#inquiry-error"),$("#nf-field-14"));
        }

        if($("#nf-field-14").val().length<1000 && $("#nf-field-14").val().length>=1){
            $("#nf-field-14-wrap").addClass("nf-pass");
            inqPass=true;

        }
        if($("#nf-field-14").val().length==0){
            $("#nf-field-14-wrap").removeClass("nf-pass");

        }

        submit();
    
    });

    //PREFERRED CONTACT
    $("#nf-field-13-0 , #nf-field-13-1").live("change", function(){

        if($("#nf-field-13-0").hasClass("nf-checked") || $("#nf-field-13-1").hasClass("nf-checked")  ){
            $("#nf-field-13-wrap").addClass("nf-pass");
            pcPass=true;
        }else{
            pcPass=false;
        }
        submit();
    });


        
    //Press enter to submit
    $(window).live("keyup keydown click change ",function(e){
        if (e.keyCode === 13) {
            e.preventDefault();
            $("#nf-field-7").click();
        }
    });
});

    
//SUBMIT
function submit() {
    // console.log(fnamePass,lnamePass,mobilePass,emailPass,pcPass,inqPass);
    if(fnamePass == true && lnamePass == true && mobilePass == true && emailPass == true && pcPass == true && inqPass == true){
        $("#nf-field-7").css("pointer-events","auto");
        $("#nf-field-7").css("opacity","1");
    }
    else{
        $("#nf-field-7").css("pointer-events","none");
        $("#nf-field-7").css("opacity","0.5");
    }    
}