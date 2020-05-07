//页面加载初始化
$(document).ready(() => {
    $('#loading').hide()
    $('#succeed-delete').hide()
    document.getElementById('del_btn').addEventListener('click', () => {
        inputObj.Init()
        showObj.init()
    })
    if (location.search != "") {
        //upDataInputInit()//数据初始化
        document.getElementById('sub_btn').addEventListener('click', () => {
            console.log('数据更新')
            upDataPost()
        })
    }else{
        document.getElementById('sub_btn').addEventListener('click', () => {
            console.log('数据新增')
            submitData()
        })
    }
})

//设置输入框对象
let inputObj = {
    name: document.getElementById('getname'),
    birthday: document.getElementById('getbirthday'),
    age: document.getElementById('getage'),
    note: document.getElementById('remarkd'),
    checkbBoy: document.getElementById('checkb'),
    checkGirl: document.getElementById('checkg'),
    Init: () => {
        inputObj.name.value = ''
        inputObj.name.className = 'form-control info_inp'
        inputObj.birthday.value = ''
        inputObj.birthday.className = 'form-control info_inp'
        inputObj.age.value = ''
        inputObj.age.className = 'form-control info_inp'
        inputObj.note.value = ''
        inputObj.note.className = 'form-control info_inp'
        inputObj.checkbBoy.checked = false
        inputObj.checkGirl.checked = false
    }
}

//设置显示错误框组对象
let showObj = {
    name: document.getElementsByClassName('verify_box')[0],
    sex: document.getElementsByClassName('verify_box')[1],
    birthday: document.getElementsByClassName('verify_box')[2],
    age: document.getElementsByClassName('verify_box')[3],
    note: document.getElementsByClassName('verify_box')[4],
    init: () => {
        let verify_boxArr = document.getElementsByClassName('verify_box')
        for (let i = 0; i < verify_boxArr.length; i++) {
            verify_boxArr[i].innerHTML = ''
        }
    }
}

//新增数据--ajax请求
function submitData() {
    let flag = verFiyPostData()
    if (flag[0] == false) {return}
    $('#loading').show()
    $.ajax({
        type: 'POST',
        url: "/insertOne",
        data: JSON.stringify(personData),
        contentType: "application/json; charset=utf-8",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            showResponseMessage(data)
        }
    });
}

//数据更新函数--ajax请求
function upDataPost() {
    let id = location.search.split('=')[1]
    console.log('查看待发送数据',personData)
    let flag = verFiyPostData()
    if (flag[0] == false) {return}
    $('#loading').show()
    personData.id=id
    console.log(personData)
    $.ajax({
        type: 'POST',
        url: "/upOneData",
        data: JSON.stringify(personData),
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#loading').hide()
            showUpDataResponseMessage(response)
        }
    });
}
