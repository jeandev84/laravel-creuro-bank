<template>
      <div class="login">
          <form action="">
              <div class="form-group">
                  <input type="email" class="form-control" placeholder="Введите е-майл">
              </div>
              <div class="form-group mt-3 mb-3">
                  <input type="password" class="form-control" placeholder="Введите пароль">
              </div>
              <button class="btn btn-primary">Войти</button>
          </form>
      </div>
</template>

<script>
export default {
    name: "Login"
}
</script>

<style scoped>
   .login {
       background-color: #fff;
       border: 1px solid #eee;
       padding: 10px;
       margin: 50px auto;
       width: 500px;
   }

   button {
       /*display: block;*/
       margin: 0 auto;
   }
</style>
