<?php

session_start();

?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard Especes</title>
        <link rel="stylesheet" href="style_especes_dashboard.css">
        <script src="script_especes_dashboard.js"></script>
    </head>
    <body style="padding: 0; margin: 0; ">
    <div id="container">
        <div id="head-div">
            <label>Bonjour <?php echo (array_key_exists("prenom", $_SESSION)) ? $_SESSION["prenom"] : "" ?> 👋</label>
            <label>Status: <?php echo (array_key_exists("fonction", $_SESSION)) ? $_SESSION["fonction"] : "" ?></label>
        </div>
        <div class="action-bar">

            <div id="logo-name">
                <img src="../Assets/logo-zoo.png" id="logo-zoo"><label style="margin: auto 0; margin-left: 20px">Zoo</label>
            </div>
            <hr>
            <!--    <div class="div-button">-->
            <!--        <button class="dashboard_btn" id="_dashboard_btn" onclick="set_iframe_animaux_dashboard()">-->
            <!--            <div style="display: flex; height: 100%; justify-content: center; align-items: center">-->
            <!--                <img src="Assets\monitor-icon.png" style="margin-right: 10px">-->
            <!--            <label style="text-align: center;">DashBoard</label>-->
            <!--        </div>-->
            <!--        </button>-->
            <!--        <script>document.getElementById('_dashboard_btn').className = 'dashboard_btn_active'</script>-->
            <!--    </div>-->
            <div class="div-button">
                <button class="dashboard_btn" id="_dashboard_btn" onclick="set_iframe_especes_dashboard()" style="padding: 0">
                    <div style="display: flex; height: 100%;align-items: center; flex-direction: row">
                        <div style="width: 30%;">
                            <img src="..\Assets\monitor-icon.png" style="margin-right: 10px">
                        </div>
                        <div style="display: flex; align-items: center; justify-content: left; margin-left: 20px; width: 70%;">
                            <label style="text-align: center;">DashBoard</label>
                        </div>
                    </div>
                </button>
                <script>document.getElementById('_dashboard_btn').className = 'dashboard_btn_active'</script>
            </div>
            <div class="div-button">
                <button class="dashboard_btn" id="add_btn" onclick="set_iframe_especes_ajouter()">
                    <div style="display: flex; height: 100%;align-items: center; flex-direction: row">
                        <div style="width: 30%;">
                            <img src="..\Assets\add-icon.png" style="margin-right: 10px">
                        </div>
                        <div style="display: flex; align-items: center; justify-content: left; margin-left: 20px; width: 70%;">
                            <label style="text-align: center;">Ajouter</label>
                        </div>
                    </div>
                </button>
            </div>
            <div class="div-button">
                <button class="dashboard_btn" id="modify_btn" onclick="set_iframe_especes_modify()">
                    <div style="display: flex; height: 100%;align-items: center; flex-direction: row">
                        <div style="width: 30%;">
                            <img src="..\Assets\modify-icon.png" style="margin-right: 10px">
                        </div>
                        <div style="display: flex; align-items: center; justify-content: left; margin-left: 20px; width: 70%;">
                            <label style="text-align: center;">Modifier</label>
                        </div>
                    </div>
                </button>
            </div>
            <div class="div-button">
                <button class="dashboard_btn" id="search_btn" onclick="set_iframe_especes_search()">
                    <div style="display: flex; height: 100%;align-items: center; flex-direction: row">
                        <div style="width: 30%;">
                            <img src="..\Assets\zoom-glass-icon.png" style="margin-right: 10px">
                        </div>
                        <div style="display: flex; align-items: center; justify-content: left; margin-left: 20px; width: 70%;">
                            <label style="text-align: center;">Rechercher</label>
                        </div>
                    </div>
                </button>
            </div>
            <div class="div-button">
                <button id="logout_btn" onclick="document.location.href = '..\\page_menu.php'"></button>
            </div>

        </div>
        <div id="iframe-div">
            <iframe src="page_especes_summary.php" id="iframe-affichage"></iframe>
        </div>
    </div>
    </body>
    </html>
