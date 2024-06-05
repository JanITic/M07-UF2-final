# M07-UF2-final

PRÀCTICA 5 - CRUD
SIGN IN + SIGN UP AMB LARAVEL
FUNCIONALITATS DE LA PRÀCTICA
1. S’ha de poder fer el login de l’aplicació.

2. Si l’usuari és administrador del centre. (4,5 punts)

S’ha de redirigir a la pantalla de l’administrador.
Ha de mostrar per pantalla un missatge de Beinvinguda.
Ha d’aparèixer per defecte tots els usuaris de les BBDD que siguin professors. Si hi ha professors a les BBDD es mostrarà per pantalla el nom, cognom, correu i si està actiu per cada professor mitjançant una taula.
Cada registre tindrà un botó per poder modificar els seus valors.
Ens redirigirà a una pantalla on ens mostrarà un formulari i carregarà els valors del professor per poder-ho modificar i guardar-los.
Un cop guardat tornarà automàticament a la pàgina d’inici i mostrarà tots els canvis en la llista de professors.
Cada registre tindrà un botó per poder-lo eliminar.
Un cop eliminat es mostrarà la llista de professors actualitzada.
En cas de que no hi hagin registres a la BBDD no apareixerà la taula de professors i en el seu lloc apareixerà un missatge que digui “No hi ha professors”.
Sempre haurà de ser visible a la part inferior un botó per poder afegir un professor.
Ens redirigirà a una pantalla on ens mostrarà un formulari i un botó per poder guardar la informació.
3. Si l’usuari és professor del centre: (4,5 punts)

Farà exactament el mateix procés que l’administrador però en aquest cas per gestionar mitjançant un crud els usuaris que siguin alumnes.
4. Si l’usuari és alumne: (1 punt)

Ha de poder afegir un document i mostrar l’enllaç per pantalla.
RECORDEU QUE:

El crear ha de fer servir el mètode POST
L’editar ha de fer servir el mètode PUT
El borrar ha de fer servir el mètode DELETE