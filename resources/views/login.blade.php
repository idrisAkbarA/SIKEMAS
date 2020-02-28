<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .i-container {
            display: grid;
            grid-template-columns: 2fr 3.5fr;
            height: 100vh;
        }

    </style>
</head>

<body>
    <v-app id="app">
        <div class="i-container">
            <div class="left">
                <v-container fluid fill-height>
                    <v-layout align-center justify-center>
                        <v-flex xs12 sm12 md6 align-center class="text-center">
                            <h1 class="margin:0">SIKEMAS</h1>
                            <h3>Kecamatan Payung Sekaki</h3>
                        </v-flex>
                    </v-layout>
                </v-container>
            </div>
            <div class="right" style="background-color:#066AFE">
                <v-container fluid fill-height>
                    <v-layout align-center justify-center>
                        <v-flex xs12 sm12 md6>
                            <v-form method="" action="/masuk" lazy-validation>
                                <h2 class="white--text mb-4">Masuk</h2>
                                <v-text-field {{-- background-color="white" --}} color="white" label="Nama Pengguna"
                                    name="name" filled prepend-inner-icon="account_box" type="text" dark required></v-text-field>

                                <v-text-field {{-- background-color="white" --}} color="white" label="Kata sandi"
                                    name="password" filled prepend-inner-icon="lock" type="password" dark required
                                    :append-icon="show1 ? 'visibility_off' : 'visibility'"
                                    @click:append="show1 = !show1" :type="show1 ? 'text' : 'password'">
                                </v-text-field>

                                <v-btn rounded type="submit">Masuk</v-btn>
                                @csrf
                            </v-form>

                        </v-flex>
                    </v-layout>
                </v-container>
            </div>
        </div>
    </v-app>


    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
