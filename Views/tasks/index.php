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
                <p class="mt-3 text-center text-gray-500 italic">Vos <span class="text-pink-200 font-bold">tâches</span>
                    apparaissent ici!</p>
            </div>
            <!--COnteneur des taches-->
            <div id="taskContainer" class="flex-auto overflow-y-auto">

            </div>
        </section>
        <!--Zone central-->
        <div class="w-4/5 border-l border-r border-gray-400 flex flex-col">
            <div class="flex-none h-20 flex flex-row justify-between items-center p-5 border-b">
                <div class="flex flex-col space-y-1">
                    <strong class="border-b-2 border-pink-100">Ma Todolist</strong>
                    <p class="text-gray-500 italic">Déplacez vos <span class="text-pink-200 font-bold">tâches</span>
                        dans la zone correspondante.</p>
                </div>
            </div>
            <div class="h-full flex overflow-y-auto p-5 space-y-4"
                 style="background-image: url(https://static.intercomassets.com/ember/assets/images/messenger-backgrounds/background-1-99a36524645be823aabcd0e673cb47f8.png)">
                <!--Tableau de bord-->
                <div class="flex w-full justify-evenly">
                    <section id="upto" class=" h-64 w-2/6 p-6">
                        <h2 class="text-center font-bold text-gray-400">À faire</h2>
                        <hr class="mt-6 border border-pink-100 shadow-sm">
                        <div class="taskCase">

                        </div>
                    </section>
                    <section id="current" class=" h-64 w-2/6 p-6">
                        <h2 class="text-center font-bold text-gray-400">En cours</h2>
                        <hr class="mt-6 border border-pink-100 shadow-sm">
                        <div class="taskCase">

                        </div>
                    </section>
                    <section id="done" class=" h-64 w-2/6 p-6">
                        <h2 class="text-center font-bold text-gray-400">Terminées</h2>
                        <hr class="mt-6 border border-pink-100 shadow-sm">
                        <div class="taskCase">

                        </div>
                    </section>
                </div>
            </div>
            <!--Task Form-->
            <form id="taskForm" method="POST">
                <div class="w-2/4 border-t border-gray- pt-6 flex-none h-40 w-full pt-0">
                    <!--Container Form-->
                    <div class="mb-2 flex w-2/4 justify-evenly">
                        <!--Container Form 1-->
                        <div class="flex flex-col text-xs justify-evenly">
                            <!--Titre-->
                            <label for="title"></label>
                            <input class="mb-3 h-8 outline-none border focus:border-pink-200 hover:border-pink-200 rounded p-4 shadow-lg"
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
                            <input class="h-8 mb-6 outline-none border focus:border-pink-200 hover:border-pink-200 rounded p-4 shadow-lg"
                                   required type="date" name="dateCreation" id="date">
                            <!--Choix importance-->
                            <label class="text-center font-bold text-gray-500 mb-2" for="list">Prioritée:</label>
                            <input id="list" list="browser" name="importance"
                                   required
                                   class="h-8 outline-none border focus:border-pink-200 hover:border-pink-200 rounded p-4 shadow-lg">
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
</div>