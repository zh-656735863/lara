//数据初始化
$(document).ready(function () {
    let url = '/totalItem'
    getSumItem(url)
    delItem.deleteItem()
    console.log('total')
})

function getSumItem(url) {
    $.ajax({
        type: 'POST',
        url: url,
        data: '',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            let item = JSON.parse(response)
            starFn(item)
        }
    })
}

function getData(data) {
    $.ajax({
        type: 'POST',
        url: '/queryPartData',
        data: JSON.stringify(data),
        contentType: "application/json;charset=utf-8",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            createTable.showMessage(response)
            console.log(response)
            document.getElementById('succeed-delete').style.zIndex = '-1'//提示框消失
        }
    })
}

let createTable = new CreateTable()
//表格创建项目
createTable.items = {
    name: '姓名',
    sex: '性别',
    age: '年龄',
    bir: '生日',
    id: 'ID',
    act: '操作'
}
createTable.init()

function CreateTable() {
    this.tbody = document.getElementById('tbody')
    this.init = function () {
        self = this
        let str = ''
        Object.keys(self.items).forEach(function (key) {
            str += `<th class="th_${key}">${self.items[key]}</th>`
        });
        let mystr = `<tr class="tb_tr">${str}</tr>`
        this.tbody.innerHTML = mystr
    },
        this.showMessage = function (response) {
            this.init()
            let myArr = JSON.parse(response)
            let Arr = new Array();
            for (let i = 0; i < myArr.length; i++) {
                Arr[0] = myArr[i].name;
                Arr[1] = myArr[i].sex;
                Arr[2] = myArr[i].age;
                Arr[3] = myArr[i].birthday;
                Arr[4] = myArr[i].id;
                Arr[5] = myArr[i].note;
                create(this.tbody, Arr, i);
            }
        }
}

//生成表格的dom函数
function create(tbody, mes, now) {
    var tr = document.createElement('tr')
    for (var i = 0; i < 6; i++) {
        let td = document.createElement('td')
        if (i != 5) {
            //给名字加一个类用来选择
            if (i == 0) {
                td.innerHTML = mes[i]
                td.className = 'showdetail'
                tr.append(td)
            } else {
                td.innerHTML = mes[i]
                tr.append(td)
            }
        } else {
            //修改按钮
            let button1 = document.createElement('button')
            let aHref = document.createElement('a')
            var hrefStr = `id=${mes[4]}`
            var hrefStr = encodeURI(hrefStr)
            aHref.href = `/append?${hrefStr}`
            aHref.target = "_blank"
            button1.id = "upDate_btn" + now
            button1.className = "tab_tbn tab_tbn_xg"
            button1.innerHTML = "修改"
            aHref.append(button1)
            td.append(aHref)
            tr.append(td)
            //删除按钮
            let button2 = document.createElement('button')
            button2.id = "delDate_btn" + now
            button2.className = "tab_tbn tab_tbn_de"
            button2.innerHTML = "删除"
            td.append(button2)
            tr.append(td)
        }
    }
    tr.id = mes[4]
    tbody.append(tr)
}

let delItem = {
    deleteItem() {
        document.addEventListener('click', function (event) {
            let delArr = document.querySelectorAll(".tab_tbn_de");
            let trArr = tbody.children;
            for (let i = 0; i < delArr.length; i++) {
                if (event.target == delArr[i]) {
                    let nid = trArr[i + 1].id
                    let message = confirm("确认删除该条信息吗？")
                    if (message != true) {
                        return
                    }
                    tbody.removeChild(trArr[i + 1]) //页面清除
                    delItem.delDate(nid); //清除对应数据库的类容
                }
            }
        });
    },


    delDate(id) {
        $.ajax({
            type: 'POST',
            url: "/delete",
            data: JSON.stringify({'id': id}),
            contentType: "application/json; charset=utf-8",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data == 1) {

                    pagination.total--
                    console.log(pagination.total)
                    pagination.init()
                    successMes.init()

                } else {
                    alert('网络不畅,稍后尝试');
                }
            }
        });
    }
}

let successMes = new SuccessMes(document.getElementById('succeed-delete'))

function SuccessMes(dom) {
    this.dom = dom;
    this.nowclasName = dom.className
    this.init = function () {
        self = this
        self.dom.style.zIndex = 1
        let cur = document.getElementById('get_item2').innerHTML - 0
        getData({offset: (cur - 1) * 10, rows: 10})
    }
}
