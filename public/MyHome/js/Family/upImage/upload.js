
$(document).ready(()=>{
    $('#succeed-delete').hide()
    $('#fail-message').hide()
})

let inputSelf = $('#inputSelf')[0]
inputSelf.addEventListener('change', () => {
    let file = inputSelf.files[0]
    let newSrc = getObjectURL(file);
    document.getElementById('uploadImage').src = newSrc;
})

function getObjectURL(file) {
    let url = null ;
    if (window.createObjectURL!=undefined) { // basic
        url = window.createObjectURL(file) ;
    } else if (window.URL!=undefined) { // mozilla(firefox)
        url = window.URL.createObjectURL(file) ;
    } else if (window.webkitURL!=undefined) { // webkit or chrome
        url = window.webkitURL.createObjectURL(file) ;
    }
    return url;
}

document.getElementById('submit_btn').addEventListener('click',()=>{
    let file=inputSelf.files[0]
    let id=location.search.split('=')[1]
    let data = new FormData()
    data.append('file', file);
    data.append('id',id);
    postImage(data)
})

function postImage(data){
    $.ajax({
        type: 'POST',
        url: "/upOneImage",
        data:data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
            showMessage(data)
        }
    });
}

function  showMessage(data) {
    if(data==1){
        console.log('上传成功')
        $('#succeed-delete').show()
        document.body.addEventListener('click',()=>{
            $('#succeed-delete').hide()
        },{once:true})
    }else{
        $('#fail-message').show()
        document.body.addEventListener('click',()=>{
            $('#fail-message').hide()
        },{once:true})
    }
}
