# send-mail
php script which allows you to send mail from your domain using buildin function of your hosting server

examples of usage in JS files

<script>
sendMail(){
    let postVars = {
        email: "bla@bla.com",
        name: "bla",
        phone: "bla bla bla",
        lastname: "bla",
        message: "bla bla bla bla bla"
    };
    const options = {
        method:'POST',
        headers:{
            'Accept': '*',
            'Content-Type': 'application/json;charset=UTF-8'
        },
        body:JSON.stringify(postVars)
    };
    fetch(this.endpoint,options)
    .then(()=> {
        this.submitPossitive = true;
        this.$refs.form.reset()
    })
    .catch(()=> {
        this.submitError = true;
    });
}
sendMail();
</script>