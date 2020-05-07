//前端表单验证
//单页面构建完成后，执行下面这个函数
let errorObj = {
    right: `<i class="fa fa-check-square-o" style="font-size:26px;color:#73C521;"></i>`,
    blank: `<p class="showerror">不能包含空格</p>`,
    require: `<p class="showerror">必填字段</p>`,
    illegal: `<p class="showerror">存在非法字符</p>`,
    format: `<p class="showerror">格式不正确</p>`,
    red:'form-control info_inp changBorderRed',
    green:'form-control info_inp'
}

let personData = {
    id:'',
    name: '',
    age: '',
    birthday: '',
    sex: '',
    note: '',
    init() {
        this.name = ''
        this.age = ''
        this.birthday = ''
        this.sex = ''
        this.note = ''
    }
}

//验证姓名
inputObj.name.addEventListener('input', (e) => {
    let nameInput = inputObj.name
    if (nameInput.value == '') { //内容为空，返回
        renderMessage('name', 'require','red')
        return
    }
    if (judgeExistBlack(nameInput.value)) { //若包含空格，返回
        renderMessage('name', 'require','red')
        inputObj.name.className = `form-control info_inp changBorderRed`
        showObj.name.innerHTML = errorObj.blank
        return
    }
    if (judgeNameLegal(nameInput, showObj.name)) {//判断名字是否合法
        renderMessage('name', 'require','red')
        inputObj.name.className = `form-control info_inp changBorderRed`
        showObj.name.innerHTML = errorObj.illegal
        return
    }
    //数据合法
    renderMessage('name', 'require','red')
    inputObj.name.className = `form-control info_inp`
    showObj.name.innerHTML = errorObj.right
    personData.name = inputObj.name.value
})

function judgeNameLegal(str) {
    let name = /^([\u4e00-\u9fa5]|[a-zA-Z]|(\(+\))|(\(\u4e00-\u9fa5]+\))|(\（[a-zA-Z]+\)))+$/;
    if (!name.exec(str)) {
        return false
    } else {
        return true
    }
}

//验证出生日期
inputObj.birthday.addEventListener('input', () => {
    let birthdayInput = inputObj.birthday
    if (birthdayInput.value == '') {//验证是否为空
        renderMessage('name', 'require','red')
        return
    }
    if (!isSatisfyFormat(birthdayInput)) { //是否符合格式
        renderMessage('birthday', 'format','red')
        return
    }
    if (!isAllNumber(birthdayInput.value)) {//验证是否都为数字
        renderMessage('birthday', 'format','red')
        return
    }
    //验证通过
    renderMessage('birthday', 'right','green')
    personData.birthday = inputObj.birthday.value
})

function renderMessage(a, b,c) {
    inputObj[a].className = errorObj[c]
    showObj[a].innerHTML = errorObj[b]
}

function isSatisfyFormat(input) {
    let value = input.value
    let num1 = value.indexOf('-')
    let num2 = value.indexOf('-', num1 + 1)
    if (num1 == -1 || num2 == -1 || (num1 == -1 && num2 == -1)) {
        renderMessage('birthday', 'format','red')
        return false
    } else {
        let myArr = value.split('-')
        if (myArr[0].length == 4 && (myArr[1].length > 0 && myArr[1].length <= 2) && (myArr[2].length > 0 && myArr[2].length <= 2)) {
            return true
        } else {
            renderMessage('birthday', 'format','red')
            return false
        }
    }
}

//判断是否都为数字
function isAllNumber(num) {
    let birArr = num.split('-')
    //console.log(birArr)
    for (let i = 0; i < birArr.length; i++) {
        let num = Number(birArr[i])
        if (isNaN(num)) {
            return false
        }
    }
    return true
}

//验证年龄
inputObj.age.addEventListener('input', () => {
    let ageInput = inputObj.age
    if (judgeExistBlack(inputObj.age.value)) {
        renderMessage('age', 'format','red')
        return
    }
    if (ageInput.value == '') {
        renderMessage('age', 'require','red')
        return
    }
    if (isNaN(Number(ageInput.value))) {
        renderMessage('age', 'format','red')
        return
    }
    //验证通过
    renderMessage('age', 'right','green')
    personData.age = ageInput.value
})


//验证备注
inputObj.note.addEventListener('input', () => {
    let noteInput = inputObj.note
    if (noteInput.value == '') {
        renderMessage('note', 'require','red')
        return
    }
    renderMessage('note', 'right','green')
    personData.note = noteInput.value
})


$('#checkb')[0].addEventListener('click', (e) => {
    showObj.sex.innerHTML = errorObj.right
    personData.sex = '男'
})

$('#checkg')[0].addEventListener('click', (e) => {
    showObj.sex.innerHTML = errorObj.right
    personData.sex = '女'
})

//有空格返回true,反之返回false
function judgeExistBlack(str) {
    if (str.indexOf(' ') !== -1) {
        return true//不存在空格返回真
    } else {
        return false
    }
}

//提交数据验证
function verFiyPostData() {
    let flagArr = new Array()
    if (personData.name == '') {
        flagArr.push(false)
        renderMessage('name', 'require','red')
    }
    if (personData.birthday == '') {
        flagArr.push(false)
        renderMessage('birthday', 'require','red')
    }
    if (personData.age == '') {
        flagArr.push(false)
        renderMessage('age', 'require','red')
    }
    if (personData.note == '') {
        flagArr.push(false)
        renderMessage('note', 'require','red')
    }
    if (personData.sex == '') {
        flagArr.push(false)
        showObj.sex.innerHTML = errorObj.require
    }
    return flagArr
}

function showResponseMessage(data) {
    if (data == 1) {
        $('#loading').hide()
        $('#succeed-delete').show()
        document.body.addEventListener('click', () => {
            $('#succeed-delete').hide()
            personData.init()
            inputObj.Init()
            showObj.init()
        }, {once: true})
    } else {
        $('#succeed-delete').innerText = '上传失败'
        $('#succeed-delete').show()
        document.body.addEventListener('click', () => {
            $('#succeed-delete').hide()
            personData.init()
            inputObj.Init()
            showObj.init()
        }, {once: true})
    }
}

function showUpDataResponseMessage(response){
    console.log(response)
    if(response==1){
        $('#succeed-delete').innerHTML = '更新成功'
        $('#succeed-delete').show()
        document.body.addEventListener('click', () => {
            $('#succeed-delete').hide()
            personData.init()
            inputObj.Init()
            showObj.init()
        }, {once: true})
    }
}
