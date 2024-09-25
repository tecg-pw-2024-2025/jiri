#!/bin/zsh

# Définir le chemin du fichier de sortie
output_file="../../lang/fr.json"

# Initialiser un tableau vide pour les traductions
declare -A translations

# Utiliser grep pour extraire toutes les occurrences de __('...') dans les fichiers Blade
grep -oR "__('\([^']*\)')" . | sed "s/^.*__('\([^']*\)').*$/\1/" | while read -r key; do
    # Ajouter chaque nouvelle chaîne au tableau (sans écraser les anciennes)
    translations[$key]=$key
done

# Générer le fichier JSON avec les nouvelles et anciennes valeurs fusionnées
echo "{" > $output_file
for key in ${(k)translations}; do
    echo "  \"$key\": \"${translations[$key]}\"," >> $output_file
done

# Retirer la dernière virgule et fermer le fichier JSON proprement
sed -i '' '$ s/,$//' $output_file
echo "}" >> $output_file

# Message de succès
echo "Fichier de traduction mis à jour : $output_file"
