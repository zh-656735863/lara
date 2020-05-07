var subBtn = document.getElementById("sub_btn")
$('#loading').hide();
$('#hint-box').hide();
$('#notFind').hide();
subBtn.addEventListener("click",()=>{
    var inputArr= $(".input_item_1")
    let flag = true
    inputArr.each(function(){
        if(this.value==""){flag=false;return}
    })
    if(flag==false){return}
    let inputObj = {
        username:inputArr[0].value,
        password:inputArr[1].value
    }
    checkData(inputObj)
})

//验证数据
function checkData(data){
    $('#loading').show();
    $.ajax({
        type:'POST',
        url:'login',
        data:data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:(response)=>{
            console.log(response)
            if(response==1){
                console.log("成功登陆")
                setTimeout(successDO,0)
            }
            else if(response==0){
                console.log("密码错误")
                passwordErrorDo()
            }else{
                console.log("此账号不存在")
                notFindDo()
            }
        }
    })
}

//输入正确
function successDO(){
    window.location.href="/"
    $('#loading').hide();
}
//密码不正确
function passwordErrorDo(){
    $('#hint-box').show();
}

let btnArr = document.querySelectorAll('.btn_error')
btnArr[1].addEventListener("click",(event)=>{
    $('#hint-box').hide();
    $('#loading').hide();
})

//没找到这个账号
function notFindDo(){
    $('#notFind').show();
}

let btnNotArr = document.querySelectorAll('.btn_not')
btnNotArr[1].addEventListener("click",(event)=>{
    $('#notFind').hide();
    $('#loading').hide();
})

console.log()
