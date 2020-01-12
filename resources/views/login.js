//let apiurl = "../../public/api/";
let apiurl = "./api/";
let login_form = document.getElementById('login_form');
let register_form = document.getElementById('register_form');
let slide_btn = document.getElementById('btn');
let login_btn = document.getElementById('login_btn');
let register_btn = document.getElementById('register_btn');

function slide_register(para) {
    login_form.style.left = "-400px";
    register_form.style.left = "50px";
    slide_btn.style.left = "110px";
    login_form.classList.toggle("tabin");
    register_form.classList.toggle("tabin");
    //slide_btn.classList.toggle("tabin");
    //$(this).find("input-group").children().toggleClass("tabin");
    //.slideToggle();
    login_btn.toggleAttribute("disabled");
    register_btn.toggleAttribute("disabled");
    //console.log(this);
    $(':input','#login_form')
    .not(':button, :submit, :reset, :hidden')
    .val('');
}

function slide_login(para) {
    login_form.style.left = "50px";
    register_form.style.left = "450px";
    slide_btn.style.left = "0";
    login_form.classList.toggle("tabin");
    register_form.classList.toggle("tabin");
    login_btn.toggleAttribute("disabled");
    register_btn.toggleAttribute("disabled");
    $(':input','#register_form')
    .not(':button, :submit, :reset, :hidden')
    .val('');
    //console.log(this);
}

function submit_fun(form_id, btn_value) {
    let api_result;
    //console.log($('form').serializeArray());
    //console.log($(('#'+id)));
    //console.log($('#'+id).find('.input-field').val());
    console.log($('#' + form_id).serializeArray());
    //console.log(id.find('.input-field').serialize());
    //$('#userData').find('.data').serialize(),
    //console.log($('#userData').find('.input-field').serialize());
    console.log(form_id);
    $.ajax({
        type: "POST",
        //url: apiurl + 'login' ,
        url: apiurl + btn_value,
        data: $('#' + form_id).serializeArray(),
        statusCode: {
            200: function(res) {
                let value = JSON.stringify(res[0]);
                //setCookie('token', value, {secure: true, 'max-age': 3600}); //secure cause getCookie failed
                setCookie('token', value, {'max-age': 3600});
                console.log(JSON.stringify(res[0]))
                console.log(document.cookie)

                //alert(btn_value+' successfully');
                api_result = res;
                window.location.href = "./comments";
        },
        400: function(res) {
                console.log(res.responseJSON[0])
                //alert(res.responseJSON[0]);
                api_result = res;
        }
}
});
    console.log(btn_value);
}