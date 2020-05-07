function RenderTables(offset, rows) {
    this.data = {
        offset: offset,
        rows: rows
    }
}

RenderTables.prototype = {
    constructor: RenderTables,
    render() {
        getData(this.data)
    },
    changeItems(curPage, totalPageNum, now) {
        document.getElementById('get_item2').innerHTML = curPage
        document.getElementById('get_item1').innerHTML = totalPageNum
        document.getElementById('get_item').innerHTML = now
    }
}

//封装为一个对象，我们提供一个参数(数据的接口)模块自动完成我们需要的功能
function Pagination() {
    this.dom = ''
    this.total = 0
    this.curPage = 1
    this.pageSize = 2
    this.pageItems = 10
    this.cursor = false
}

Pagination.prototype = {
    constructor: Pagination,
    render: function (dom, totalPageNum, curPage, pageSize, pageItems) {
        let head = `<li class="page-item"><a class="page-link" aria-label="Previous" id='previous'>
					<span aria-hidden="true" style="pointer-events:none;">&laquo;</span></a></li>`

        let tail = `<li class="page-item"><a class="page-link" aria-label="Next" id='next'>
					<span aria-hidden="true" style="pointer-events:none;">&raquo;</span></a></li>`
        let lis = getShowArr(curPage, 10, totalPageNum)
        for (let i = 0; i < lis.length; i++) {
            if (lis[i] == curPage) {
                lis[i] = `<li class="page-item page-item1 active"><a class="page-link">${lis[i]}</a></li>`
            } else {
                lis[i] = `<li class="page-item page-item1"><a class="page-link">${lis[i]}</a></li>`
            }
        }
        let id = Math.random() + ""
        let ul = `<ul id='${id}' class="pagination"  -webkit-user-select='none'>${head}${lis.join('')}${tail}</ul>`

        dom.innerHTML = ul
        let offset = (curPage-1) * pageSize
        rend.changeItems(curPage, totalPageNum, this.total)

        if (this.cursor === true) {
            this.isPagPart(curPage)
        }

        let self = this
        //绑定事件
        let ulDom = document.getElementById(id)
        ulDom.addEventListener('click', (event) => {
            if (event.target.className == 'page-link') {
                let callbacks = self.eventMap.change || []
                for (let i = 0; i < callbacks.length; i++) {
                    if (event.target.innerHTML == curPage || event.target.innerHTML == '···') {
                        return
                    }  //点击内容的与当前页面一致就返回
                    else if (event.target.id == 'next') {
                        if (curPage == totalPageNum) {
                            return
                        }  //到达最后你一页
                        curPage++
                        callbacks[i](curPage, pageSize)
                    } else if (event.target.id == 'previous') {
                        if (curPage == 1) {
                            return
                        }  //当前在第一页
                        curPage--
                        callbacks[i](curPage, pageSize)
                    } else {
                        callbacks[i](event.target.innerHTML, pageSize)   //回调函数
                        curPage = event.target.innerHTML
                    }
                    this.render(dom, totalPageNum, curPage - 0, pageSize, pageItems)
                    // this.isPagPart(curPage, totalPageNum)
                }
            }
        })
    },

    isPagPart: function (curPage, totalPageNum) {
        let previous = document.getElementById('previous')
        let next = document.getElementById('next')
        if (curPage == 1) {
            previous.style.cursor = 'not-allowed'
        } else if (curPage == totalPageNum) {
            next.style.cursor = 'not-allowed'
        } else if (curPage != 1 && curPage != totalPageNum) {
            next.style.cursor = 'pointer'
            previous.style.cursor = 'pointer'
        }
    },

    init() {
        let totalPageNum = Math.ceil(this.total / this.pageSize)
        this.render(this.dom, totalPageNum, this.curPage, this.pageSize, this.pageItems)
    },

    f1(callback) {
        if (!this.eventMap.change) {
            this.eventMap.change = [callback]
        } else {
            this.eventMap.change.push(callback)
        }
    },

    eventMap: {
        change: []
    }
}

//创建一个RenderTables构造函数的实例
//必须县创建实例在引用

let rend = new RenderTables(0, 10)
let pagination = new Pagination()

//初始化相关
function starFn(total) {
    pagination.dom = document.querySelector('.pagination')
    pagination.total = total
    pagination.pageSize = 10
    pagination.cursor = true
    pagination.init()
    rend.render()
}

pagination.f1(function (offset, pageSize) {
    rend.data = {
        offset: (offset-1) * pageSize,
        rows: pageSize
    }
    console.log(rend.data)
    rend.render()
    rend.changeItems(offset)
})
