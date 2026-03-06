# Cache (Use efficient cache lifetimes) sur OVH

Si Lighthouse affiche encore **Cache TTL 15m** pour tes fichiers, c’est qu’OVH (proxy/Nginx) impose ses propres en-têtes et **ignore le `.htaccess`**.

## À faire côté OVH

1. **Espace client OVH** → **Hébergement** → ton offre → onglet **« Multisite »** ou **« Performance »** / **« Cache »**  
   - Activer le **cache** ou le **CDN** si proposé.  
   - Vérifier s’il existe une option pour **durée de cache** ou **en-têtes Cache-Control**.

2. **Support OVH**  
   Demander d’activer des en-têtes de cache longs pour les fichiers statiques, par exemple :  
   `Cache-Control: max-age=31536000, public` pour `.css`, `.js`, images.

3. **CDN OVH (si disponible)**  
   Si un CDN est proposé pour ton hébergement, l’activer : il gère souvent le cache à la place du serveur.

Le fichier `.htaccess` du projet est correct ; le réglage restant se fait **côté configuration OVH**, pas dans le code.
