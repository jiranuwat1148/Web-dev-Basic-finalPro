<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-gray-300 w-screen h-screen">
<div class="min-h-screen flex items-center justify-center"> 
  <section class="rounded-md p-2">
    <div class="flex items-center justify-center my-3">
       <div class="xl:mx-auto shadow-md p-4 xl:w-full xl:max-w-sm 2xl:max-w-md">
        <div class="mb-2"></div>
        <h2 class="text-2xl font-bold leading-tight">
          Sign up to create account
        </h2>
        <p class="mt-2 text-base text-gray-600">
          Already have an account? Sign In
        </p>
        <form class="mt-5">
          <div class="space-y-4">
            <div>
              <label class="text-base font-medium text-gray-900">
                User Name
              </label>
              <div class="mt-2">
                <input
                  placeholder="Full Name"
                  type="text"
                  class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                  name="user_name"
                />
              </div>
            </div>
            <div>
              <div class="flex items-center justify-between">
                <label class="text-base font-medium text-gray-900">
                  Password
                </label>
              </div>
              <div class="mt-2">
                <input
                  placeholder="Password"
                  type="password"
                  class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                  name="password"
                />
              </div>
            </div>
            <div>
              <div class="flex items-center justify-between">
                <label class="text-base font-medium text-gray-900">
                  Password
                </label>
              </div>
              <div class="mt-2">
                <input
                  placeholder="Password"
                  type="password"
                  class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                  name="password"
                />
              </div>
            </div>
            <div>
              <button
                class="inline-flex w-full items-center justify-center rounded-md bg-black px-3.5 py-2.5 font-semibold leading-7 text-white hover:bg-black/80"
                type="button"
              >
                Create Account
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

</body>
</html>