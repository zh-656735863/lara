window.onload = function () {
    document.body.addEventListener('click', function (event) {
        showDetail(event)
    });
}

//获取位置
function showDetail(event) {
    let liArr = $('.showdetail')
    let dom = $("#movediv")[0]
    for (let i = 0; i < liArr.length; i++) {
        if (event.target == liArr[i]) {
            let x = getElementLeft(event.target)
            let y = getElementTop(event.target)
            showDetailDiv(x, y, event.target.parentNode.id)
            return;
        }
    }
    if (dom.contains(event.target) == false) {
        $('#movediv').hide()
    }
}

//改变IDV可见
function showDetailDiv(x, y, cru) {
    let dom = $('#movediv')[0]
    getUpTime(cru)
    dom.style.left = `${x}px`
    dom.style.top = `${y}px`
    dom.style.zIndex = "1"
}

function getUpTime(cru){
    $.ajax({
        type: 'POST',
        url: "/getUpTimeById",
        data:JSON.stringify({'id':cru}),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            let data = JSON.parse(response)[0]
            appendText(data.times, data.note, data.id)
        }
    })
}

function appendText(time, note, id) {
    let div = document.getElementById("movediv")
    let upTime = time
    let Note = note
    let url = `/getOneImageById?id=${id}`

    let tex = `<p>上次更新时间:</p><p>${upTime}</p>`

    let str = `<div id="headPortrait"><div><img src='${url}'/>
	          <div class="desc_box"><span><a href="/upload?id=${id}" target="_self">修改头像</a></span>
	          <span>备注:${Note}</span></div></div>${tex}</div>`
    div.innerHTML = str
}

//获取页面元素绝对位置LEFT
function getElementLeft(element) {
    let actualLeft = element.offsetLeft;
    let current = element.offsetParent;
    while (current !== null) {
        actualLeft += current.offsetLeft;
        current = current.offsetParent;
    }
    return actualLeft;
}

//获取页面元素绝对位置TOP
function getElementTop(element) {
    let actualTop = element.offsetTop;
    let current = element.offsetParent;
    while (current !== null) {
        actualTop += current.offsetTop;
        current = current.offsetParent;
    }
    return actualTop;
}
