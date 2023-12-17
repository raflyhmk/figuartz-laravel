@extends('layout.user.user')
@section('content')
<section style="background-color: #9a7b41">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10" style="margin-top: -40px">
            <div class="card" style="border-radius: 1rem">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img
                    src="{{url ('assets/user/image/image-login.png')}}"
                    alt="login form"
                    class="img-fluid"
                    style="
                      border-radius: 1rem 0 0 1rem;
                      height: 100%;
                      box-shadow: 11px 0px 14px -3px rgba(223, 154, 27, 0.12);
                    "
                  />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">
                    <form action="" method="POST">
                        @csrf
                        @if (session('error'))
                            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                      <div class="d-flex align-items-center mb-2">
                        <h1 class="titleLogin fw-bold">Welcome to FiguartZ</h1>
                      </div>

                      <div class="form-outline">
                        <label class="form-label" for="form2Example17"
                          >Nama</label
                        >
                        <input
                          type="text"
                          id="form2Example17"
                          class="form-control mb-2"
                          placeholder="Silahkan masukan nama..."
                          name="name"
                          required
                        />
                      </div>
                      <div class="form-outline">
                        <label class="form-label" for="form2Example17"
                          >Email</label
                        >
                        <input
                          type="email"
                          id="form2Example17"
                          class="form-control mb-2"
                          placeholder="Silahkan masukan email..."
                          name="email"
                          required
                        />
                      </div>

                      <div class="form-outline">
                        <label class="form-label" for="form2Example27"
                          >Password</label
                        >
                        <input
                          type="password"
                          id="form2Example27"
                          class="form-control mb-2"
                          placeholder="silahkan masukan password..."
                          name="password"
                          required
                        />
                      </div>
                      <div class="form-outline">
                        <label class="form-label" for="form2Example27"
                          >Confirm password</label
                        >
                        <input
                          type="password"
                          id="form2Example27"
                          class="form-control mb-4"
                          placeholder="silahkan masukan password..."
                          name="password_confirmation"
                          required
                        />
                      </div>

                      <div class="mb-3">
                        <button
                          class="btn btn-warning btn-lg btn-login"
                          type="submit"
                          style="width: 160px"
                        >
                          Register
                        </button>
                      </div>
                      <p class="register fw-medium">
                        Sudah punya akun?
                        <a href="/login" class="fw-bold">login!</a>
                      </p>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection