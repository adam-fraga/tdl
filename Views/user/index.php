<?php
$sub = null;
if (isset($_POST['submit'])):
    $User = new \App\Models\UserModel();
    $_POST['prenom'] = $User->secure($_POST['prenom']);
    $_POST['nom'] = $User->secure($_POST['nom']);
    $_POST['email'] = $User->secure($_POST['email']);
    $_POST['password'] = $User->secure($_POST['password']);
    $User->hydrate($_POST);
    if ($User->subscribe($User)) {
        $_SESSION['User'] = $User;
        $sub = true;
    } else {
        $sub = false;
    }
endif;
?>
<div class="min-w-screen min-h-screen flex items-center justify-center bg-gray-100 px-5 py-5">
    <div class="text-gray-500  shadow-2xl w-full overflow-hidden bg-white" style="max-width:1000px">
        <div class="md:flex w-full">
            <div style="background:center url('https://images.unsplash.com/photo-1526280760714-f9e8b26f318f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1867&q=80'); background-size: cover"
                 class="relative hidden md:block w-1/2 border border-gray-50 py-10 px-10">
            </div>
            <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                <div class="text-center mb-10">
                    <h1 class="font-bold text-3xl text-gray-900">Inscription</h1>
                    <p>Entrez vos informations personnelles</p>
                </div>
                <div>
                    <form method="post">

                        <div class="flex -mx-3">
                            <div class="w-1/2 px-3 mb-5">
                                <label for="fname" class="text-xs font-semibold px-1">Prénom</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"></div>
                                    <input id="fname" name="prenom" type="text"
                                           required
                                           class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-pink-100"
                                           placeholder="John">
                                </div>
                            </div>
                            <div class="w-1/2 px-3 mb-5">
                                <label for="name" class="text-xs font-semibold px-1">Nom</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"></div>
                                    <input id="name" name="nom" type="text"
                                           required
                                           class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-pink-100"
                                           placeholder="Smith">
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <label for="email" class="text-xs font-semibold px-1">Email</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                    <input id="email" name="email" type="email"
                                           required
                                           class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-pink-100"
                                           placeholder="johnsmith@example.com">
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-12">
                                <label for="password" class="text-xs font-semibold px-1">Mot de passe</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center flex items-center justify-center"></div>
                                    <input id="password" name="password" type="password"
                                           pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                                           required
                                           class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-pink-100"
                                           placeholder="************">
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <button type="submit" value="submit" name="submit"
                                        class="text-gray-400 block w-full max-w-xs mx-auto text-black rounded-lg px-3 py-3 font-semibold btn-pink hover:bg-pink-100 shadow-perso">
                                    Envoyer
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>