<?php
// filepath: /path/to/create_or_update_users_table.php



// Enable error reporting for debugging
ini_set('display_errors', 'on');
error_reporting(E_ALL);

// Include database connection
include('db-connect.php');

// Define the columns and their definitions
$columns = [
    'id' => "INT AUTO_INCREMENT PRIMARY KEY",
    'username' => "VARCHAR(50) NOT NULL UNIQUE",
'KLtotalkill' => "INT DEFAULT 0",
'KLdummy' => "INT DEFAULT 0",
'KLrat' => "INT DEFAULT 0",
'KLgiantrat' => "INT DEFAULT 0",
'KLspider' => "INT DEFAULT 0",
'KLscorpion' => "INT DEFAULT 0",
'KLgiantspider' => "INT DEFAULT 0",
'KLalphascorpion' => "INT DEFAULT 0",
'KLscorpionguard' => "INT DEFAULT 0",
'KLmammothscorpion' => "INT DEFAULT 0",
'KLscorpionqueen' => "INT DEFAULT 0",
'KLscorpionking' => "INT DEFAULT 0",
'KLsquirrel' => "INT DEFAULT 0",
'KLbutterfly' => "INT DEFAULT 0",
'KLbat' => "INT DEFAULT 0",
'KLgator' => "INT DEFAULT 0",
'KLsandcrab' => "INT DEFAULT 0",
'KLgoldenbat' => "INT DEFAULT 0",
'KLsalamander' => "INT DEFAULT 0",
'KLgoblin' => "INT DEFAULT 0",
'KLgoblinbandit' => "INT DEFAULT 0",
'KLgoblinchief' => "INT DEFAULT 0",
'KLcow' => "INT DEFAULT 0",
'KLsnake' => "INT DEFAULT 0",
'KLhillogre' => "INT DEFAULT 0",
'KLhobgoblin' => "INT DEFAULT 0",
'KLorc' => "INT DEFAULT 0",
'KLogre' => "INT DEFAULT 0",
'KLogreguard' => "INT DEFAULT 0",
'KLfireogress' => "INT DEFAULT 0",
'KLogrelieutenant' => "INT DEFAULT 0",
'KLogrepriest' => "INT DEFAULT 0",
'KLkobold' => "INT DEFAULT 0",
'KLflyingkobold' => "INT DEFAULT 0",
'KLkoboldshaman' => "INT DEFAULT 0",
'KLkoboldninja' => "INT DEFAULT 0",
'KLkoboldwarlock' => "INT DEFAULT 0",
'KLkoboldchampion' => "INT DEFAULT 0",
'KLkoboldmaster' => "INT DEFAULT 0",
'KLkoboldmonk' => "INT DEFAULT 0",
'KLwildboar' => "INT DEFAULT 0",
'KLwolf' => "INT DEFAULT 0",
'KLcoyote' => "INT DEFAULT 0",
'KLbuck' => "INT DEFAULT 0",
'KLbear' => "INT DEFAULT 0",
'KLstag' => "INT DEFAULT 0",
'KLbigfoot' => "INT DEFAULT 0",
'KLhawk' => "INT DEFAULT 0",
'KLimp' => "INT DEFAULT 0",
'KLtarantula' => "INT DEFAULT 0",
'KLsewerrat' => "INT DEFAULT 0",
'KLredgator' => "INT DEFAULT 0",
'KLflyingdungbeetle' => "INT DEFAULT 0",
'KLthief' => "INT DEFAULT 0",
'KLthiefpickpocket' => "INT DEFAULT 0",
'KLthiefbrute' => "INT DEFAULT 0",
'KLmasterthief' => "INT DEFAULT 0",
'KLskeleton' => "INT DEFAULT 0",
'KLskeletonarcher' => "INT DEFAULT 0",
'KLskeletonknight' => "INT DEFAULT 0",
'KLskeletonsorcerer' => "INT DEFAULT 0",
'KLancientskeleton' => "INT DEFAULT 0",
'KLomar' => "INT DEFAULT 0",
'KLvictoria' => "INT DEFAULT 0",
'KLrabidskeever' => "INT DEFAULT 0",
'KLbleedingdartwing' => "INT DEFAULT 0",
'KLmongoliandeathworm' => "INT DEFAULT 0",
'KLdemonwing' => "INT DEFAULT 0",
'KLpossessedaxeman' => "INT DEFAULT 0",
'KLredbandit' => "INT DEFAULT 0",
'KLbanditmarauder' => "INT DEFAULT 0",
'KLbutcher' => "INT DEFAULT 0",
'KLredbeard' => "INT DEFAULT 0",
'KLjellyfish' => "INT DEFAULT 0",
'KLelectriceel' => "INT DEFAULT 0",
'KLpiranha' => "INT DEFAULT 0",
'KLbarracuda' => "INT DEFAULT 0",
'KLsquid' => "INT DEFAULT 0",
'KLalbatross' => "INT DEFAULT 0",
'KLcrocodile' => "INT DEFAULT 0",
'KLkingsquid' => "INT DEFAULT 0",
'KLmudcrab' => "INT DEFAULT 0",
'KLgiantseaturtle' => "INT DEFAULT 0",
'KLcolossalsquid' => "INT DEFAULT 0",
'KLhammerhead' => "INT DEFAULT 0",
'KLgreatwhite' => "INT DEFAULT 0",
'KLkraken' => "INT DEFAULT 0",
'KLglowingoctopus' => "INT DEFAULT 0",
'KLthunderbarbarian' => "INT DEFAULT 0",
'KLsmoothranger' => "INT DEFAULT 0",
'KLcoralwizard' => "INT DEFAULT 0",
'KLheavywalrus' => "INT DEFAULT 0",
'KLwatertempleguardian' => "INT DEFAULT 0",
'KLposeidon' => "INT DEFAULT 0",
'KLdaggerdemon' => "INT DEFAULT 0",
'KLironrat' => "INT DEFAULT 0",
'KLironcrab' => "INT DEFAULT 0",
'KLironscorpion' => "INT DEFAULT 0",
'KLwarturtle' => "INT DEFAULT 0",
'KLslagbeast' => "INT DEFAULT 0",
'KLirongator' => "INT DEFAULT 0",
'KLirongolem' => "INT DEFAULT 0",
'KLphoenix' => "INT DEFAULT 0",
'KLironcobra' => "INT DEFAULT 0",
'KLearthgolem' => "INT DEFAULT 0",
'KLsteelrat' => "INT DEFAULT 0",
'KLsteelcrab' => "INT DEFAULT 0",
'KLsteelscorpion' => "INT DEFAULT 0",
'KLulfberht' => "INT DEFAULT 0",
'KLblackfrog' => "INT DEFAULT 0",
'KLsteelgator' => "INT DEFAULT 0",
'KLsteelgolem' => "INT DEFAULT 0",
'KLcyclops' => "INT DEFAULT 0",
'KLstoneassassin' => "INT DEFAULT 0",
'KLgammamonk' => "INT DEFAULT 0",
'KLmithrilrat' => "INT DEFAULT 0",
'KLmithrilcrab' => "INT DEFAULT 0",
'KLmithrilscorpion' => "INT DEFAULT 0",
'KLgriffin' => "INT DEFAULT 0",
'KLbluefrog' => "INT DEFAULT 0",
'KLmithrilgator' => "INT DEFAULT 0",
'KLmithrilgolem' => "INT DEFAULT 0",
'KLminotaur' => "INT DEFAULT 0",
'KLcosmicmage' => "INT DEFAULT 0",
'KLcarbonbeast' => "INT DEFAULT 0",
'KLstonesentinel' => "INT DEFAULT 0",
'KLironsentinel' => "INT DEFAULT 0",
'KLsteelsentinel' => "INT DEFAULT 0",
'KLmithrilsentinel' => "INT DEFAULT 0",
'KLsentineltitan' => "INT DEFAULT 0",
'KLbowman' => "INT DEFAULT 0",
'KLhighwayman' => "INT DEFAULT 0",
'KLtroll' => "INT DEFAULT 0",
'KLtrollshaman' => "INT DEFAULT 0",
'KLtrollsorcerer' => "INT DEFAULT 0",
'KLtrollelder' => "INT DEFAULT 0",
'KLtrollchampion' => "INT DEFAULT 0",
'KLtrollqueen' => "INT DEFAULT 0",
'KLtrollking' => "INT DEFAULT 0",
'KLfalcon' => "INT DEFAULT 0",
'KLent' => "INT DEFAULT 0",
'KLdarkranger' => "INT DEFAULT 0",
'KLwisp' => "INT DEFAULT 0",
'KLforestprincess' => "INT DEFAULT 0",
'KLdemigodofstrength' => "INT DEFAULT 0",
'KLdemigodofdefense' => "INT DEFAULT 0",
'KLlurker' => "INT DEFAULT 0",
'KLwingeddemon' => "INT DEFAULT 0",
'KLundeadorc' => "INT DEFAULT 0",
'KLstonesphinx' => "INT DEFAULT 0",
'KLwarpedpriest' => "INT DEFAULT 0",
'KLdarkpaladin' => "INT DEFAULT 0",
'KLdarkprince' => "INT DEFAULT 0",
'KLfriendlygiant' => "INT DEFAULT 0",
'KLmountaingiant' => "INT DEFAULT 0",
'KLicetroll' => "INT DEFAULT 0",
'KLgiantbrute' => "INT DEFAULT 0",
'KLwyvern' => "INT DEFAULT 0",
'KLstonedwarf' => "INT DEFAULT 0",
'KLgiantmountaingiant' => "INT DEFAULT 0",
'KLgatekeeper' => "INT DEFAULT 0",
'KLyeti' => "INT DEFAULT 0",
'KLsnowogre' => "INT DEFAULT 0",
'KLsnowninja' => "INT DEFAULT 0",
'KLsnowowl' => "INT DEFAULT 0",
'KLdragon' => "INT DEFAULT 0",
'KLgreygargoyle' => "INT DEFAULT 0",
'KLwhitegargoyle' => "INT DEFAULT 0",
'KLvampire' => "INT DEFAULT 0",
'KLfallenangel' => "INT DEFAULT 0",
'KLfallenpriest' => "INT DEFAULT 0",
'KLrisenskeleton' => "INT DEFAULT 0",
'KLsilvertitan' => "INT DEFAULT 0",
'KLjiemji' => "INT DEFAULT 0",
'KLjikay' => "INT DEFAULT 0",
'KLkingblade' => "INT DEFAULT 0",
'KLbullfrog' => "INT DEFAULT 0",
'KLnewt' => "INT DEFAULT 0",
'KLlizardthief' => "INT DEFAULT 0",
'KLdervishassassin' => "INT DEFAULT 0",
'KLrogueimperial' => "INT DEFAULT 0",
'KLinfinitymage' => "INT DEFAULT 0",
'KLvenomdragon' => "INT DEFAULT 0",
'KLmageultima' => "INT DEFAULT 0",
'KLsnappingturtle' => "INT DEFAULT 0",
'KLswampgator' => "INT DEFAULT 0",
'KLanaconda' => "INT DEFAULT 0",
'KLblackbear' => "INT DEFAULT 0",
'KLsalamanderspirit' => "INT DEFAULT 0",
'KLlizardscout' => "INT DEFAULT 0",
'KLlizardranger' => "INT DEFAULT 0",
'KLlizardknight' => "INT DEFAULT 0",
'KLlizardnecromancer' => "INT DEFAULT 0",
'KLlizardcommander' => "INT DEFAULT 0",
'KLlizardqueen' => "INT DEFAULT 0",
'KLlizardking' => "INT DEFAULT 0",
'KLlesserdemon' => "INT DEFAULT 0",
'KLhydra' => "INT DEFAULT 0",
'KLbrownie' => "INT DEFAULT 0",
'KLharpy' => "INT DEFAULT 0",
'KLgorgon' => "INT DEFAULT 0",
'KLbanshee' => "INT DEFAULT 0",
'KLsuccubus' => "INT DEFAULT 0",
'KLmagmagoblin' => "INT DEFAULT 0",
'KLmagmakobold' => "INT DEFAULT 0",
'KLmagmaorc' => "INT DEFAULT 0",
'KLmagmaogre' => "INT DEFAULT 0",
'KLmagmatroll' => "INT DEFAULT 0",
'KLchimera' => "INT DEFAULT 0",
'KLbasilisk' => "INT DEFAULT 0",
'KLcerberus' => "INT DEFAULT 0",
'KLmanticore' => "INT DEFAULT 0",
'KLmedusa' => "INT DEFAULT 0",
'KLskeletonking' => "INT DEFAULT 0",
'KLleviathan' => "INT DEFAULT 0"

    // Add more columns as needed...
];

// Check if the `users_kl` table exists
$tableExists = $link->query("SHOW TABLES LIKE 'users_kl'");
if ($tableExists->num_rows === 0) {
    // Create the `users_kl` table if it doesn't exist
    $createTableQuery = "CREATE TABLE users_kl (id INT AUTO_INCREMENT PRIMARY KEY)";
    if ($link->query($createTableQuery)) {
        echo "Table `users_kl` created successfully.<br>";
    } else {
        die("Error creating table: " . $link->error);
    }
}

// Check and add missing columns
foreach ($columns as $column => $definition) {
    $query = "SELECT COUNT(*) AS count 
              FROM INFORMATION_SCHEMA.COLUMNS 
              WHERE TABLE_NAME = 'users_kl' AND COLUMN_NAME = '$column'";
    $result = $link->query($query);
    $row = $result->fetch_assoc();
    
    if ($row['count'] == 0) {
        $alterQuery = "ALTER TABLE users_kl ADD $column $definition";
        if ($link->query($alterQuery)) {
            echo "Column `$column` added successfully.<br>";
        } else {
            echo "Error adding column `$column`: " . $link->error . "<br>";
        }
    }
}

// echo "Table `users_kl` is up to date.";

include('members.php');


?>