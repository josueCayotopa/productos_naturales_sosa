<div class="product-detail-wrapper">
    <section class="singUp-area section-py-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="singUp-wrap">
                        <h2 class="title">¡Bienvenido de nuevo!</h2>
                        <p>¡Hola! ¿Listo para iniciar sesión? Simplemente ingresa tu correo electrónico y contraseña a continuación y estarás de vuelta en acción en poco tiempo. ¡Vamos allá!</p>

                        <div class="account__divider">
                            <span>o</span>
                        </div>
                        <form wire:submit.prevent='save' class="account__form">
                            <div class="form-grp">
                                <label for="email">Correo electrónico</label>
                                <input type="email" id="email" wire:model="email" required>
                                @error('email') <span class="error">{{ $message }}</span>
                                 @enderror
                            </div>
                            <div class="form-grp">
                                <label for="password">Contraseña</label>
                                <input type="password" id="password" wire:model="password" required>
                                @error('password') <span class="error">{{ $message }}</span> 
                                @enderror
                            </div>
                            <div class="account__check">
                                <div class="account__check-remember">
                                    <input type="checkbox" class="form-check-input" wire:model="remember" id="remember">
                                    <label for="remember" class="form-check-label">Recuérdame</label>
                                </div>
                                <div class="account__check-forgot">
                                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-two btn-sm" style="border-radius: 5px;">Iniciar sesión</button>
                        </form>
                        <div class="account__switch">
                            <p>¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

