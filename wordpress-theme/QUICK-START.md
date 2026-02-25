# 🚀 GUIDE DE DÉMARRAGE RAPIDE - THÈME WORDPRESS DOST'AUDIT

## Installation en 5 Minutes

### Étape 1: Préparer le Package (30 secondes)
```powershell
# Dans PowerShell, depuis le dossier dost-audit:
Compress-Archive -Path wordpress-theme\* -DestinationPath dost-audit-theme.zip
```

### Étape 2: Installer sur WordPress (2 minutes)
1. Connectez-vous à votre admin WordPress
2. Allez dans **Apparence** > **Thèmes** > **Ajouter**
3. Cliquez sur **Téléverser un thème**
4. Sélectionnez `dost-audit-theme.zip`
5. Cliquez sur **Installer maintenant**
6. Cliquez sur **Activer**

### Étape 3: Configuration Minimale (2 minutes)
1. **Apparence** > **Menus**
   - Créez un menu nommé "Menu Principal"
   - Cochez "Primary Menu" dans les emplacements
   
2. **Apparence** > **Personnaliser** > **Identité du site**
   - Uploadez votre logo

3. **Services** > **Ajouter**
   - Ajoutez au moins 1 service pour tester

### Étape 4: Visualiser (10 secondes)
- Visitez votre site!
- Le thème est activé avec le design complet ✨

## Configuration Complète (30 minutes)

### Menus (5 min)
```
Primary Menu items:
├── Accueil (#home)
├── Services (#services)
├── Équipe (#about)
├── Témoignages (#testimonials)
├── FAQ (#faq)
└── Contact (#contact)
```

### Custom Post Types (20 min)

**Services (6 items):**
1. Expertise Comptable
2. Audit & Commissariat
3. Conseil Fiscal
4. Gestion Sociale
5. Création d'Entreprise
6. Conseil Juridique

**Team (3 items minimum):**
- Nom du membre
- Photo (Image à la une)
- Bio (Contenu)

**Testimonials (3-5 items):**
- Nom du client (Titre)
- Témoignage (Contenu)
- Photo (Image à la une)

**FAQs (5-10 items):**
- Question (Titre)
- Réponse (Contenu)

### Customizer (5 min)
- Hero: Titre, description, image
- CTA: Texte et lien du bouton
- Couleurs: Ajustez si nécessaire
- Social: Ajoutez vos liens

## Checklist de Lancement

- [ ] Logo uploadé
- [ ] Menu principal configuré
- [ ] 6 services ajoutés
- [ ] 3+ membres d'équipe ajoutés
- [ ] 3+ témoignages ajoutés
- [ ] 5+ FAQs ajoutées
- [ ] Hero section personnalisée
- [ ] Liens sociaux ajoutés
- [ ] Footer widgets configurés
- [ ] Formulaire de contact testé
- [ ] Site testé sur mobile

## Dépannage Rapide

**Le menu ne s'affiche pas?**
→ Vérifiez que le menu est assigné à "Primary Menu"

**Les images ne chargent pas?**
→ Régénérez les miniatures: Plugins > Add New > "Regenerate Thumbnails"

**Le formulaire ne fonctionne pas?**
→ Installez "WP Mail SMTP" pour configurer l'email

**Les animations ne fonctionnent pas?**
→ Videz le cache (Ctrl+F5) et vérifiez que JavaScript est activé

## Commandes Utiles

```powershell
# Créer le package
Compress-Archive -Path wordpress-theme\* -DestinationPath dost-audit-theme.zip

# Lister les fichiers du thème
Get-ChildItem -Path wordpress-theme -Recurse -File | Select-Object FullName

# Copier vers un site WordPress local
Copy-Item -Path wordpress-theme -Destination "C:\xampp\htdocs\wordpress\wp-content\themes\dost-audit" -Recurse
```

## Ressources Rapides

- 📖 **README complet**: `wordpress-theme/README.md`
- 📋 **Guide complet**: `INSTALLATION-COMPLETE.md`
- 📦 **Instructions package**: `PACKAGE-INSTRUCTIONS.md`

## Support Express

**Erreur PHP?**
→ Vérifiez PHP 7.4+ requis

**Thème ne s'active pas?**
→ Vérifiez les permissions des fichiers (755 pour dossiers, 644 pour fichiers)

**Styles ne s'appliquent pas?**
→ Videz le cache WordPress et navigateur

---

**🎉 Votre thème est prêt! Bon développement!**
