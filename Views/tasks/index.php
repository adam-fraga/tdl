<!--On peut affiché les donnée du controller avec les variables
 éclaté grace à extract dans la vue-->
<?php //var_dump($tasks);
if (isset($_POST['task'])):
    $Tasks = new \App\Models\TasksModel();
    $_POST['nom'] = $Tasks->secure($_POST['nom']);
    $_POST['description'] = $Tasks->secure($_POST['description']);
    $_POST['dateCreation'] = $Tasks->secure($_POST['dateCreation']);
    $_POST['importance'] = $Tasks->secure($_POST['importance']);
    $Tasks->hydrate($_POST);
endif;
?>
<div class="flex flex-row h-screen bg-gray-100">
    <div class="flex flex-row flex-auto bg-white rounded-tl-xl border-l shadow-xl">
        <!--Section des tâches crée-->
        <section class="flex flex-col w-1/5 bg-gray-100">
            <div class="flex-none  h-24 py-6 border-b border-gray-400">
                <h1 class="text-center font-semibold text-2xl">Mes Tâches</h1>
            </div>
            <!--COnteneur des taches-->
            <div id="taskContainer" class="flex-auto overflow-y-auto">

            </div>
        </section>
        <!--Zone central-->
        <div class="w-3/5 border-l border-r border-gray-400 flex flex-col">
            <div class="flex-none h-20 flex flex-row justify-between items-center p-5 border-b">
                <div class="flex flex-col space-y-1">
                    <strong class="border-b-2 border-pink-100">Ma Todolist</strong>
                    <label>
                        <input type="text" placeholder="Add coversation title"
                               class="text-sm outline-none border-b border-dashed text-black placeholder-gray-600"/>
                    </label>
                </div>
                <div class="flex flex-row items-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex overflow-y-auto p-5 space-y-4"
                 style="background-image: url(https://static.intercomassets.com/ember/assets/images/messenger-backgrounds/background-1-99a36524645be823aabcd0e673cb47f8.png)">
                <!--Tableau de bord-->
                <div id="" class="flex w-full justify-evenly">
                    <section id="upto" class=" h-64 w-2/6 p-6">
                        <h2 class="text-center">A faire</h2>
                        <hr class="mt-6 border border-pink-100 shadow-sm">
                        <div class="taskCase">

                        </div>
                    </section>
                    <section id="current" class=" h-64 w-2/6 p-6">
                        <h2 class="text-center">En cours</h2>
                        <hr class="mt-6 border border-pink-100 shadow-sm">
                        <div class="taskCase">

                        </div>
                    </section>
                    <section id="done" class=" h-64 w-2/6 p-6">
                        <h2 class="text-center">Terminé</h2>
                        <hr class="mt-6 border border-pink-100 shadow-sm">
                        <div class="taskCase">

                        </div>
                    </section>
                </div>
            </div>
            <!--Task Form-->
            <form id="taskForm" method="POST" class="">
                <div class="">
                    <div class="flex-none h-40 w-full pt-0">
                        <!--Container Form-->
                        <div class="mb-2 flex h-full justify-evenly">
                            <!--Container Form 1-->
                            <div class="flex flex-col text-xs justify-evenly">
                                <!--Titre-->
                                <label for="title"></label>
                                <input class="h-8 outline-none border focus:border-pink-200 hover:border-pink-200 rounded p-4 shadow-lg"
                                       required type="text" name="nom" id="title" placeholder="Titre">
                                <!--Description-->
                                <label for="describe"></label>
                                <textarea
                                        id="describe"
                                        class="outline-none border focus:border-pink-200 hover:border-pink-200 rounded p-4 shadow-lg"
                                        placeholder="Description..."
                                        required name="description"></textarea>
                            </div>
                            <!--Container Form 2-->
                            <div class="justify-evenly flex text-center text-xs flex-col">
                                <label for="date"></label>
                                <input class="h-8  outline-none border focus:border-pink-200 hover:border-pink-200 rounded p-4 shadow-lg"
                                       required type="date" name="dateCreation" id="date">
                                <!--Choix importance-->
                                <label for="list">Prioritée:</label>
                                <input id="list" list="browser" name="importance"
                                       required  class="h-8 outline-none border focus:border-pink-200 hover:border-pink-200 rounded p-4 shadow-lg">
                                <datalist id="browser">
                                    <option value="Haute">
                                    <option value="Moyenne">
                                    <option value="Basse">
                                </datalist>
                            </div>
                            <!--Container Form 3-->
                            <div class="self-center inline-block mr-2 mt-2">
                                <button id="addTask"
                                        type="submit"
                                        class=" focus:outline-none text-black text-sm py-2.5 px-5 border-b-4 border-pink-200 rounded-md bg-pink-100 hover:bg-pink-200"
                                        name="task">
                                    <i>Ajouter</i>
                                </button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>

    <div class="w-1/5 bg-gray-100 overflow-y-auto flex flex-col">
        <div class=" p-6 flex-none border-b border-gray-400 flex flex-col">
            <h3 class="text-center font-semibold text-2xl">Tâches Collaboratives</h3>
        </div>

        <div class="flex flex-col space-y-4 p-4">
            <div class="flex flex-none h-64 bg-white border border-pink-200 rounded p-4 justify-center items-center">
                Tâche collaboratives
            </div>
            <div class="flex flex-none h-64 bg-white border border-pink-200 rounded p-4 justify-center items-center">
                Tâche collaboratives
            </div>
            <div class="flex flex-none h-64 bg-white border border-pink-200 rounded p-4 justify-center items-center">
                Tâche collaboratives
            </div>
        </div>
    </div>
</div>