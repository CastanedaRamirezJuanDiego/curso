
@include('layout.scrips')
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>

            <form action="{{route ('validar')}}" method="POST">
                {{csrf_field()}}
            <div class="form-outline mb-4">
            <label class="form-label" for="typeEmailX-2">Usuario</label>
          
              <input name="usuario" id="usuario" class="form-control form-control-lg" />
              @if($errors ->first('usuario'))
             <p class='text-danger'>{{$errors->first('usuario')}} </p>
            @endif
            </div>

            <div class="form-outline mb-4">
            <label class="form-label" for="typePasswordX-2">Password</label>
        
              <input type="password"  name="pasw" id="pasw" class="form-control form-control-lg" />
              @if($errors ->first('usuario'))
             <p class='text-danger'>{{$errors->first('usuario')}} </p>
            @endif
            </div>
            @if(Session::has('mensaje'))
        <div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif
            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            <hr class="my-4">
        </form>
            <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
              type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
              <hr>
            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
              type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
