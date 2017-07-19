function loadModels(){
    var manufacturer_id = document.getElementById("manufacturer_id").value;
    
    $.getJSON('http://localhost/praktikum-iiwt/api/car/modelsByManufacturer/manufacturer/'+ manufacturer_id, {}, createModels);
}

function createModels (rezultat) {
    if($.isPlainObject(rezultat)) {
        if (rezultat.status == 'success'){
            $('#model_id').html('');
            for (var i in rezultat.models) {
                var model = rezultat.models[i];
                
                var option = $('<option>');
                $(option).append(model.model_name);
                $(option).attr('value', model.model_id);
                
                $('#model_id').append(option);
            }
        } else {
            $('details').append('There was an error');
        }
    }
}

function validateForm(){
    var form_ok = true;
    
    if ($('#inputEmail').val().length < 6){
        form_ok = false;
        $('#inputEmail').parent('div').parent('.form-group').addClass('has-error');
    } else {
        $('#inputEmail').parent('div').parent('.form-group').removeClass('has-error');
    }
    
    if ($('#inputPassword').val().length < 6){
        form_ok = false;
        $('#inputPassword').parent('div').parent('.form-group').addClass('has-error');
    } else {
        $('#inputPassword').parent('div').parent('.form-group').removeClass('has-error');
    }
        
    return form_ok;
    
}

function validateRegisterForm(){
    var form_ok = true;
    
    if ($('#inputEmail1').val().length < 6){
        form_ok = false;
        $('#inputEmail1').parent('div').parent('.form-group').addClass('has-error');
    } else {
        $('#inputEmail1').parent('div').parent('.form-group').removeClass('has-error');
    }
    
    if ($('#inputPassword2').val().length < 6){
        form_ok = false;
        $('#inputPassword2').parent('div').parent('.form-group').addClass('has-error');
    } else {
        $('#inputPassword2').parent('div').parent('.form-group').removeClass('has-error');
    }
    
    if ($('#repeatPassword').val().length < 6){
        form_ok = false;
        $('#repeatPassword').parent('div').parent('.form-group').addClass('has-error');
    } else {
        $('#repeatPassword').parent('div').parent('.form-group').removeClass('has-error');
    }
    
    if ($('#forename').val().length < 2){
        form_ok = false;
        $('#forename').parent('div').parent('.form-group').addClass('has-error');
    } else {
        $('#forename').parent('div').parent('.form-group').removeClass('has-error');
    }
    
    if ($('#surname').val().length < 2){
        form_ok = false;
        $('#surname').parent('div').parent('.form-group').addClass('has-error');
    } else {
        $('#surname').parent('div').parent('.form-group').removeClass('has-error');
    }
    
    if ($('#phone').val().length < 7){
        form_ok = false;
        $('#phone').parent('div').parent('.form-group').addClass('has-error');
    } else {
        $('#phone').parent('div').parent('.form-group').removeClass('has-error');
    }
        
    return form_ok;
    
}