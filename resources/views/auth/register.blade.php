<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jatobá - Register</title>
  <!-- Fontes Google -->
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600&family=Halant:wght@400;500;600&display=swap" rel="stylesheet">
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Iconoir -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/iconoir@6.11.0/css/iconoir.min.css">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'jatoba': '#C87532',
            'dark': '#262626',
            'footer-bg': '#FBFBFB',
            'subtitle': '#A1A1A1'
          }
        }
      }
    }
  </script>

  <style>
    *{
        margin: 0;
        padding: 0;
    }

    body {
      font-family: 'Geist', sans-serif;
    }

    .logo {
        width: 24px;
        height: 24px;
    }

    .input-field {
      padding: 10px 12px;
      font-size: 12px;
      color: #262626;
      width: 100%;
      border: 1px solid #262626;
    }

    .input-field:focus-visible {
        outline: none;
    }

    .login-btn {
      padding: 12px 24px;
      font-size: 16px;
      border: 1px solid #262626;
      color: #262626;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .footer-header {
      color: #262626;
      font-size: 20px;
      margin-bottom: 1rem;
    }
    .footer-link {
      color: #A1A1A1;
      margin-bottom: 0.5rem;
      display: block;
    }

    .footer-link:hover {
      color: #262626;
      margin-bottom: 0.5rem;
      display: block;
    }

    .error-message {
      color: #FF4343;
      font-size: 12px;
      margin-top: 4px;
    }
  </style>
</head>
<body class="bg-white">
  <div class="flex flex-col min-h-screen">
    <!-- Main Content -->
    <div class="flex flex-col md:flex-row flex-grow login-container">
      <!-- Left Side - Register Form -->
      <div class="w-full md:w-1/2 flex flex-col p-6">
        <!-- Logo -->
        <div class="mb-20">
          <a href="/shop"><img class="logo" src="/assets/facullogo.svg" alt="Jatobá Logo"></a>
        </div>

        <!-- Register Form -->
        <div class="mt-16 max-w-md">
          <h2 class="text-3xl font-normal mb-2">Register</h2>
          <p class="text-sm mb-8">Already have an account? <a href="{{ route('login') }}" class="underline">Login</a></p>

          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
              <input type="text" name="name" placeholder="NAME" class="input-field uppercase">
            </div>
            <div class="mb-4">
              <input type="email" name="email" placeholder="EMAIL" class="input-field uppercase">
            </div>
            <div class="mb-4">
              <input type="password" name="password" placeholder="PASSWORD" class="input-field uppercase">
            </div>
            <div class="mb-8">
              <input type="password" name="password_confirmation" placeholder="CONFIRM PASSWORD" class="input-field uppercase">
            </div>

            @if ($errors->any())
                <div class="mb-4 error-message" style="color:red">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="flex gap-2"> <i class="iconoir-warning-circle ml-2 hover:text-[#A1A1A1]"></i>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="login-btn w-full flex justify-between hover:text-[#A1A1A1]">
              REGISTER
              <span class="iconoir-arrow-right ml-2 hover:text-[#A1A1A1]"></span>
            </button>
          </form>
        </div>
      </div>

      <!-- Right Side - Image -->
      <div class="hidden md:block md:w-1/2">
        <img src="/assets/registerimg.png" alt="Living room with yellow sunlight and pillows" class="w-full h-full object-cover">
      </div>
    </div>

    <!-- Footer -->
    <footer class="mt-auto bg-[#FBFBFB] py-12">
        <div class="container px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Policies & Terms -->
                <div>
                    <h4 class="text-[#262626] font-medium mb-4 uppercase">Policies & Terms</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-[#A1A1A1] text-sm hover:text-[#262626]">TERMS & CONDITIONS</a></li>
                        <li><a href="#" class="text-[#A1A1A1] text-sm hover:text-[#262626]">POLICY AND POLITICS</a></li>
                    </ul>
                </div>

                <!-- Shopping -->
                <div>
                    <h4 class="text-[#262626] font-medium mb-4 uppercase">Shopping</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-[#A1A1A1] text-sm hover:text-[#262626]">PAYMENT METHODS</a></li>
                        <li><a href="#" class="text-[#A1A1A1] text-sm hover:text-[#262626]">RETURNS & EXCHANGES</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="text-[#262626] font-medium mb-4 uppercase">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-[#A1A1A1] text-sm hover:text-[#262626]">+1 1234-5678</a></li>
                        <li><a href="#" class="text-[#A1A1A1] text-sm hover:text-[#262626]">info@jatoba.com</a></li>
                        <li>
                            <p class="text-[#A1A1A1] text-sm">
                                Av. Engenheiro Eusébio Stevaux, 823<br>
                                Santo Amaro, São Paulo - SP, 04696-000
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
  </div>
</body>
</html>
