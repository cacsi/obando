
function _login() {
    let data = {
        username: username.value,
        password: password.value,
        token: 'public',
        id: 'public',
        action: 'login'
    }
    
    axios.post('/obando/API',data).then(res=>{
        if(res.data.status == true){
            setCookie('token', res.data.token)
            setCookie('user_id', res.data.user_id)
            window.location.href='admin/dashboard'
        }
    }).catch(err => {
        console.log(err)
    })
}     

function _logout() {
    axios.post('/obando/API',{action:'logout'}).then((res)=>{
        if(res.data.status){
            swal.fire({
                title: "THANK YOU!",
                text: "LOG OUT SUCCESSFULLY!",
                icon: "success",
                showConfirmButton: true,
                allowOutsideClick: false,
            }).then((res) => {
                if (res.value) {
                    deleteAllCookies();
                    window.location.href = '/Obando/';
                }
            })
        }
    })
}   

