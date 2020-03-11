<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>SIKEMAS</title>
    <style>
        
    </style>
</head>

<body>
    <v-app id="app">
        <v-navigation-drawer v-model="drawer" app floating>
            <v-list-item two-line>
                <v-list-item-avatar>
                    <v-icon>mdi-home</v-icon>
                </v-list-item-avatar>
      
                <v-list-item-content>
                  <v-list-item-title>SIKEMAS</v-list-item-title>
                  <v-list-item-subtitle>Kec. Payung Sekaki</v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>
              <v-divider style="margin-top:4px"></v-divider> 
              <v-list dense>
                  <v-list-item @click="dashboard()" class="@yield('dashboard')">
                    <v-list-item-action>
                        <v-icon>mdi-view-dashboard</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title class="font-weight-medium body-2">Dashboard</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item @click="formkegiatan()" class="@yield('formkegiatan')">
                    <v-list-item-action>
                        <v-icon>mdi-contact-mail</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title class="font-weight-medium body-2">Kegiatan</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item @click="akunpengguna()" class="@yield('akunpengguna')">
                    <v-list-item-action>
                        <v-icon>mdi-account</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title class="font-weight-medium body-2">Akun Pengguna</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item @click="ubahsandi()" class="@yield('ubahsandi')">
                    <v-list-item-action >
                        <v-icon>mdi-lock</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title class="blue-text font-weight-medium body-2">Ubah Kata Sandi</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar app color="#e3f3ff" flat dense>
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-toolbar-title>@yield('halaman')</v-toolbar-title>
            <v-progress-linear :active="loading" indeterminate absolute bottom color="light-blue darken-1">
            </v-progress-linear>
        </v-app-bar>

        <v-content style="background-color: #e3f3ff">
                @yield('content')
        </v-content>
    </v-app>

</body>


</html>
