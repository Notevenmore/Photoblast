@extends('layouts.app')
@section('content')
<section id="content">
  @include('layouts.nav')
  <section id="Camera">
    <section id="Photos">
    </section>
    <div class="video-container">
      <video id="video" class=" watch-video"></video>
      <div id="countdown-display"></div>
    </div>
    <div class="button">
      <div class="timer-button">
        <button>
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" viewBox="0 0 80 80" fill="none" style="margin-top: 7px;">
            <rect width="105" height="100" fill="url(#pattern0_108_25)"/>
            <defs>
            <pattern id="pattern0_108_25" patternContentUnits="objectBoundingBox" width="10" height="10">
            <use xlink:href="#image0_108_25" transform="scale(0.015)"/>
            </pattern>
            <image id="image0_108_25" width="50" height="50" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAE+UlEQVR4nO2aa4hVVRTHx1FnGoPMXpZa2QQllkEPeiiWVFBRVhY90B5kU0FJKmoPelDRl7Q+lRRRH6svgdFLQ4tyKFKappxKK2/0ULOcLMqc1JFfrMt/y/J0z5lzzzn3egP/cGD2a+39n73X2mutfZua9qO2AM4A3gU2AW8C4+o18SHAlcCTwFvAOmArsAPYDvwEfA68DTwCXAQMj5E1BviDvbEBOLhWiz8AuBFYDuymMnbqi2t7DbgcGOLkzlb7EmAU0KnydUUTaAPma9sD/gReB+YCFwBHAy1uzFDgGLXNU99tbvxG4DZgMLBIdfM11nbZMK9IEpcB37kFrARmAMNi+huBoTFtBwLTgQ+dvC+A9yJE9iJWxC487yb8CJjs2puBicDD0oOS9MMfo/Vqewg4Bxjkxk8GVkWOXrFEgKOAbgn7C7jdFu6U3Bb/PdXDxjxoMiRrkGRvK5wI0K7/btj2shkEWrUII5YXJuN+kynZJwBfFUZEO1FyulA2f8Apmqho9AATNMcI4NzcRKQT4TiZ+WtT/bW6FwaEk1UNtgNXRdaSi0hQ7C/dTnQk3BdZiLwMnAWcHvlOjRiCQOTFLCYWKd141V1TDYmURG5OuZ5F6m/zT6zmSIV74k7VnQz8XQ2JlET6gE9SfJsjetSShojd2IbVuhtaZK2oAZGsmJ3Gdwpux4WquzfrbAUT2ehclfXhHosjYg6gYZXKwyt4ofuCyG7ziCXrY9VNTSJiXqxhZt7dqMGO3CdZN6i8LI6EuRr9suMHyV34uoGIlNwpCaHBf+MTYJoGLFf5tLwzF0wEd+tb5Ej04gyTBUV6QOUFNB6RBZJnEabhiUpELDzdo0TAqw1I5CXJuzpWT4Bv1HiiynbxNBqRNZI3XuV1lYj0qjHEBr81IJHNkjdS5d8rEQnRXPn6j0R3WbDCyV5BMfjHxUKGnfUg0u5kH08x6HMeyB5icUfr0Eg5C372CQdlVIrAr5J3uMpbkpT9JJW7c5AI4fAQkVhaEJEuyZ2QpOyWljRMU/mVnCTGqUwNze8bSRfioyrf3WAkDHdJ/uPlEiysRMTytoaVEVvdKCT8HWc5tcoesLIW/XLGDlPdZzQOiS7NcQSwS1/FJLh1ekeDZqk8q0FI+LA7HPmlFUlEfP0eufHDgF+Ix9N1IrFJd0ezsjqG6WlD3WC97hhgkmdqTMLQEbFWG0JWMomMpfwNa5V4aHbKtS/QqTW0ukBvTiIJlw4qRWKTsXp9qjd67U1Fa7BEueFbOzkDEtGgSzXILNjZqjvffJs6kugDpmjuSbJShotTkXBkntPAH4DRqruiTmT6bC73nmjvj4bFVZFwim9ZPsMaF6dMyelQDoQtwHkuIdLjEobJCp5A5kglw5DAsDPmCH5QAxLvu/zVGJfhNL0YmYlE5KEnkLEtnqR6u2ducdueBz9aQhtl4PUMZyYWzX1cLhKRnemS4F3KYpQth0x0R0YTbWNudcFcG/CYU+zVuXciRmeedYuw7b7enpNdn7Fa2Auy/yWZ7a36u1NtM4Fj3bjBet0tOfmLM+tESkKXuKOGAjLLgY3KIGs0cI8L6sI/qDoTm3N35ipD7hPNnwJPKRl+pvRrhL521d2kPt2RhyOTNSf1ZVcwoVY5mssUAlSLfoXBM2p6jKqBJZT1m5KFFoLKV+tVNmaH/l6rn25Yn6mx8cR+NP3/8S83clOkQWfgVQAAAABJRU5ErkJggg=="/>
            </defs>
            </svg>
        </button>
        <div class="time"><span class="value">3</span><span>S</span></div>
      </div>
      <button class="camera-button">
        <div class="circle"></div>
      </button>
      <div class="autocapture-button">
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" viewBox="0 0 80 80" fill="none">
              <rect width="105" height="100" fill="url(#pattern0_108_41)"/>
              <defs>
              <pattern id="pattern0_108_41" patternContentUnits="objectBoundingBox" width="10" height="10">
              <use xlink:href="#image0_108_41" transform="scale(0.015)"/>
              </pattern>
              <image id="image0_108_41" width="50" height="50" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABy0lEQVR4nO3ZP2sUQRzG8SEWCTYSiG2CltoEbe1Ma+e/V6CIL8BOW1vtfAFa2FqZQonaprSUBLRSjGnkDN7xkeN+R9aQrGd273Y3zLdcbpnny8xzdzOTUiaTyWQmBMt4iE94k7oE5nELrzGwTzdEcAGP8bUQ/hde4hpOpbaCM7iDD/7mIx5gKbUVzOEqnqNXCP8dT7Ha6t7YD7BVCD+ILgw7Md/a3hgFuIFX+F0I8Dn6cK7VvVEhQOO9wSLuY/NAgM14vjiN3hiNew8321Dc/+qN0bhreFEYd6+KyEaNxd0KqeWSd1fwCNsOoYrImNIA8dnVmKXhbI3pxWwOZ3XuiPcWcBvrB8TrF5lGcXExvjC+lYWfmkis3yt4hp+FcX7Es0vHEG9EZKOG4mqDyJhKxW2NSPr3L32/LoGZieAsnmDHFEkzECn2ptMi/ZMiMhNSFgnyjNRMyksryEurZlJeWu1aWv2TMiNvuy6yE39Il7ooMohd5HA3efrYAoWA7/FuhiLbsRlbqRx+Arm6RZq5WlCfSLNXC6qJ7MZJy+VGwk/am5Lirsch3EJqMw7nSxzAnU9dAXsRvhfnV2tHHZG2GlzH3bKrhUwmkxrlDz4vQSEyTTDtAAAAAElFTkSuQmCC"/>
              </defs>
              </svg>
        </button>
        <div class="status"><span class="value">OFF</span></div>
      </div>
    </div>
  </section>
</section>
  <script>
    const email = "{{ $email }}";
    const limit = {{ $limit }}
    var photoName = {!! json_encode($photoname) !!};
    const request = "{{ $request }}"
  </script>
  <script src="{{ asset('js/camera.js') }}"></script>
@endsection
