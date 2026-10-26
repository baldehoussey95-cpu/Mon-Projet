<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>HB Fashion Store</title>
<style>
:root{--pink:#d95788;--pale:#fff0f5;--ink:#30232a;--muted:#756770;--green:#20b95a}
*{box-sizing:border-box}body{margin:0;font-family:Arial,sans-serif;color:var(--ink);background:#fff}
header{text-align:center;padding:26px 16px;background:linear-gradient(135deg,#fff0f5,#fff);border-bottom:1px solid #f5dce5}
header h1{margin:0;color:var(--pink);font-size:clamp(26px,4vw,38px)}header p{margin:8px 0 0;color:var(--muted)}
nav{display:flex;justify-content:center;flex-wrap:wrap;gap:20px;background:var(--pink);padding:14px;position:sticky;top:0;z-index:2}
nav a{color:#fff;text-decoration:none;font-weight:bold}
.hero{text-align:center;padding:65px 18px;background:linear-gradient(130deg,#fff0f5,#fff,#fce2ec)}
.hero small{color:var(--pink);font-weight:bold;letter-spacing:2px;text-transform:uppercase}
.hero h2{font-size:clamp(30px,5vw,46px);margin:15px 0}.hero h2 span{color:var(--pink)}
.hero p{max-width:600px;margin:0 auto 24px;line-height:1.7;color:var(--muted)}
.btn{display:inline-block;border:0;border-radius:24px;background:var(--pink);color:white;padding:12px 18px;font-weight:bold;text-decoration:none;cursor:pointer}
.btn:hover{filter:brightness(.94)}.btn.secondary{background:#f6e0e9;color:#8d3156}.btn.danger{background:#a92e4c}.btn.whatsapp{background:var(--green)}
section{scroll-margin-top:65px}.catalog{padding:42px 18px;max-width:1200px;margin:auto}
.section-title{text-align:center;margin-bottom:24px}.section-title h2{margin:8px 0;font-size:30px}.section-title p{color:var(--muted)}
.toolbar{display:flex;gap:10px;flex-wrap:wrap;justify-content:space-between;align-items:center;margin-bottom:22px}
input,select,textarea{width:100%;padding:11px 12px;border:1px solid #e4d6dc;border-radius:9px;font:inherit;background:white;color:var(--ink)}
input:focus,select:focus,textarea:focus{outline:2px solid #f3b5cc;border-color:var(--pink)}
.toolbar input{max-width:320px}.toolbar select{max-width:220px}
.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px}
.card{border:1px solid #f0dce4;border-radius:15px;padding:14px;box-shadow:0 5px 18px #b33e6810;overflow:hidden}
.product-image{height:230px;background:var(--pale);border-radius:10px;display:flex;align-items:center;justify-content:center;overflow:hidden;margin-bottom:14px}
.product-image img{width:100%;height:100%;object-fit:cover}.placeholder{font-size:64px}
.card h3{margin:8px 0}.category{display:inline-block;background:var(--pale);color:#a63865;border-radius:20px;padding:5px 10px;font-size:12px}
.desc{font-size:14px;color:var(--muted);line-height:1.5;min-height:40px}.price{font-size:21px;color:var(--pink);font-weight:bold;margin:13px 0}
.card-actions{display:flex;flex-direction:column;gap:8px}.card-actions .btn{width:100%;text-align:center}
.admin{background:#fff8fb;border-top:1px solid #f4dce6;border-bottom:1px solid #f4dce6;padding:38px 18px}
.admin-inner{max-width:900px;margin:auto}.admin h2{text-align:center;margin-top:0}.notice{font-size:14px;color:var(--muted);line-height:1.6;background:#fff;padding:12px;border-radius:10px;border:1px solid #f2dce5}
.form-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px;margin-top:18px}.field label{display:block;font-weight:bold;font-size:14px;margin-bottom:7px}.field.full{grid-column:1/-1}
.form-buttons{display:flex;gap:10px;flex-wrap:wrap;margin-top:16px}.preview{font-size:13px;color:var(--muted);margin-top:7px}
.empty{text-align:center;color:var(--muted);padding:30px;grid-column:1/-1}
footer{text-align:center;padding:25px 15px;color:var(--muted);line-height:1.8}footer strong{color:var(--pink)}
@media(max-width:600px){nav{gap:12px}.form-grid{grid-template-columns:1fr}.field.full{grid-column:auto}.toolbar input,.toolbar select{max-width:none;width:100%}.product-image{height:250px}}
</style>
</head>
<body>
<header><h1>HB Fashion Store</h1><p>La mode qui révèle votre beauté ♡</p></header>
<nav><a href="#accueil">Accueil</a><a href="#boutique">Boutique</a><a href="#gestion">Gérer les articles</a><a href="#contact">Contact</a></nav>
<section class="hero" id="accueil">
<small>Style • Élégance • Confiance</small>
<h2>La mode, avec <span>élégance.</span></h2>
<p>Découvrez les vêtements tendance pour hommes, femmes et enfants. Choisissez vos articles et commandez directement sur WhatsApp.</p>
<a class="btn" href="#boutique">Découvrir la boutique</a>
</section>
<section class="catalog" id="boutique">
<div class="section-title"><h2>Notre boutique</h2><p>Nos articles disponibles</p></div>
<div class="toolbar">
<input id="search" type="search" placeholder="Rechercher un vêtement..." aria-label="Rechercher un vêtement">
<select id="filter" aria-label="Filtrer par catégorie"><option value="Tous">Toutes les catégories</option><option>Femmes</option><option>Hommes</option><option>Enfants</option><option>Accessoires</option></select>
</div>
<div class="grid" id="products"></div>
</section>
<section class="admin" id="gestion">
<div class="admin-inner">
<h2>Gestion de la boutique</h2>
<p class="notice"><strong>Ton espace de gestion :</strong> remplis le formulaire pour ajouter un article ou sélectionne « Modifier » sur une fiche existante. Les données sont enregistrées dans ce navigateur sur cet appareil. Pour de vraies photos, choisis une image sur ton ordinateur. Évite les images très volumineuses.</p>
<form id="productForm">
<input type="hidden" id="productId">
<div class="form-grid">
<div class="field"><label for="name">Nom de l'article *</label><input id="name" required maxlength="90" placeholder="Ex. Robe élégante"></div>
<div class="field"><label for="price">Prix en FCFA *</label><input id="price" required type="number" min="0" step="1" placeholder="Ex. 15000"></div>
<div class="field"><label for="category">Catégorie *</label><select id="category" required><option value="Femmes">Femmes</option><option value="Hommes">Hommes</option><option value="Enfants">Enfants</option><option value="Accessoires">Accessoires</option></select></div>
<div class="field"><label for="image">Photo de l'article</label><input id="image" type="file" accept="image/*"><div class="preview" id="imageHelp">Facultatif — JPG, PNG ou WebP.</div></div>
<div class="field full"><label for="description">Description</label><textarea id="description" rows="3" maxlength="300" placeholder="Décris brièvement le vêtement, la taille ou les couleurs..."></textarea></div>
</div>
<div class="form-buttons"><button class="btn" id="saveBtn" type="submit">Ajouter l'article</button><button class="btn secondary" id="cancelBtn" type="button" hidden>Annuler la modification</button></div>
</form>
<p class="notice" style="margin-top:18px">Conseil : sauvegarde régulièrement une copie de tes données. Le stockage local peut être effacé si tu supprimes les données du navigateur ou changes d'appareil.</p>
</div>
</section>
<section class="catalog" id="contact">
<div class="section-title"><h2>Contactez-nous</h2><p>Une question sur un article ? Écris-nous sur WhatsApp.</p>
<a class="btn whatsapp" id="contactWhatsApp" href="#" target="_blank" rel="noopener">Contacter HB Fashion Store</a></div>
</section>
<footer><strong>HB Fashion Store</strong><br>Merci de faire partie de notre univers mode !<br>© <span id="year"></span> HB Fashion Store</footer>
<script>
"use strict";

/* Ton numéro WhatsApp au format international, sans + ni espaces. */
const WHATSAPP_NUMBER = "221788105614";
const STORAGE_KEY = "hbFashionStoreProductsV1";

const starterProducts = [
 {id:"demo-1",name:"Chemise élégante",price:10000,category:"Hommes",description:"Une chemise moderne pour un look raffiné.",image:"",emoji:"👔"},
 {id:"demo-2",name:"Robe élégante",price:15000,category:"Femmes",description:"Une robe chic pour vos sorties et occasions.",image:"",emoji:"👗"},
 {id:"demo-3",name:"Tenue enfant",price:7500,category:"Enfants",description:"Une tenue confortable pour les enfants.",image:"",emoji:"👕"}
];

const productsEl = document.getElementById("products");
const form = document.getElementById("productForm");
const idInput = document.getElementById("productId");
const nameInput = document.getElementById("name");
const priceInput = document.getElementById("price");
const categoryInput = document.getElementById("category");
const descriptionInput = document.getElementById("description");
const imageInput = document.getElementById("image");
const imageHelp = document.getElementById("imageHelp");
const saveBtn = document.getElementById("saveBtn");
const cancelBtn = document.getElementById("cancelBtn");
let selectedImage = "";
let products = loadProducts();

function loadProducts() {
    try {
        const saved = localStorage.getItem(STORAGE_KEY);
        if (saved !== null) {
            const parsed = JSON.parse(saved);
            if (Array.isArray(parsed)) return parsed;
        }
    } catch (error) {
        console.error("Impossible de lire les articles sauvegardés.", error);
    }
    return starterProducts.map(p => ({...p}));
}

function saveProducts() {
    try {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(products));
        return true;
    } catch (error) {
        alert("La sauvegarde a échoué. L'image est peut-être trop volumineuse. Choisis une image plus petite.");
        console.error(error);
        return false;
    }
}

function formatPrice(price) {
    return Number(price).toLocaleString("fr-FR") + " FCFA";
}

function makeWhatsAppLink(product) {
    const message = `Bonjour HB Fashion Store, je souhaite commander : ${product.name}. Prix : ${formatPrice(product.price)}. Catégorie : ${product.category}. Merci de me confirmer la disponibilité.`;
    return `https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`;
}

function renderProducts() {
    const query = document.getElementById("search").value.trim().toLocaleLowerCase("fr");
    const category = document.getElementById("filter").value;
    const visible = products.filter(p => {
        const matchesText = `${p.name} ${p.description || ""} ${p.category}`.toLocaleLowerCase("fr").includes(query);
        return matchesText && (category === "Tous" || p.category === category);
    });

    productsEl.innerHTML = "";
    if (!visible.length) {
        productsEl.innerHTML = '<p class="empty">Aucun article trouvé. Essaie une autre recherche ou ajoute un article.</p>';
        return;
    }

    visible.forEach(product => {
        const card = document.createElement("article");
        card.className = "card";

        const photo = document.createElement("div");
        photo.className = "product-image";
        if (product.image) {
            const img = document.createElement("img");
            img.src = product.image;
            img.alt = product.name;
            photo.appendChild(img);
        } else {
            const emoji = document.createElement("span");
            emoji.className = "placeholder";
            emoji.textContent = product.emoji || "👚";
            photo.appendChild(emoji);
        }

        const badge = document.createElement("span");
        badge.className = "category";
        badge.textContent = product.category;

        const title = document.createElement("h3");
        title.textContent = product.name;

        const desc = document.createElement("p");
        desc.className = "desc";
        desc.textContent = product.description || "Contactez-nous pour plus d'informations.";

        const price = document.createElement("p");
        price.className = "price";
        price.textContent = formatPrice(product.price);

        const actions = document.createElement("div");
        actions.className = "card-actions";

        const order = document.createElement("a");
        order.className = "btn whatsapp";
        order.href = makeWhatsAppLink(product);
        order.target = "_blank";
        order.rel = "noopener";
        order.textContent = "Commander sur WhatsApp";

        const edit = document.createElement("button");
        edit.className = "btn secondary";
        edit.type = "button";
        edit.textContent = "Modifier";
        edit.addEventListener("click", () => startEdit(product.id));

        const remove = document.createElement("button");
        remove.className = "btn danger";
        remove.type = "button";
        remove.textContent = "Supprimer";
        remove.addEventListener("click", () => deleteProduct(product.id));

        actions.append(order, edit, remove);
        card.append(photo, badge, title, desc, price, actions);
        productsEl.appendChild(card);
    });
}

function resetForm() {
    form.reset();
    idInput.value = "";
    selectedImage = "";
    imageHelp.textContent = "Facultatif — JPG, PNG ou WebP.";
    saveBtn.textContent = "Ajouter l'article";
    cancelBtn.hidden = true;
}

function startEdit(id) {
    const product = products.find(p => p.id === id);
    if (!product) return;
    idInput.value = product.id;
    nameInput.value = product.name;
    priceInput.value = product.price;
    categoryInput.value = product.category;
    descriptionInput.value = product.description || "";
    selectedImage = product.image || "";
    imageInput.value = "";
    imageHelp.textContent = selectedImage
        ? "Une photo existe déjà. Choisis un nouveau fichier pour la remplacer, ou laisse ce champ vide pour la conserver."
        : "Facultatif — JPG, PNG ou WebP.";
    saveBtn.textContent = "Enregistrer les modifications";
    cancelBtn.hidden = false;
    document.getElementById("gestion").scrollIntoView({behavior:"smooth"});
}

function deleteProduct(id) {
    const product = products.find(p => p.id === id);
    if (!product) return;
    if (!confirm(`Supprimer « ${product.name} » ?`)) return;
    const previous = products;
    products = products.filter(p => p.id !== id);
    if (!saveProducts()) {
        products = previous;
        return;
    }
    if (idInput.value === id) resetForm();
    renderProducts();
}

imageInput.addEventListener("change", () => {
    const file = imageInput.files[0];
    if (!file) return;
    if (!file.type.startsWith("image/")) {
        alert("Choisis un fichier image valide.");
        imageInput.value = "";
        return;
    }
    if (file.size > 1.5 * 1024 * 1024) {
        alert("Cette image dépasse 1,5 Mo. Choisis une image plus légère pour éviter de remplir le stockage.");
        imageInput.value = "";
        return;
    }
    const reader = new FileReader();
    reader.onload = () => {
        selectedImage = reader.result;
        imageHelp.textContent = "Nouvelle photo prête à être enregistrée.";
    };
    reader.onerror = () => alert("Impossible de lire cette image. Essaie un autre fichier.");
    reader.readAsDataURL(file);
});

form.addEventListener("submit", event => {
    event.preventDefault();
    const name = nameInput.value.trim();
    const price = Number(priceInput.value);
    const category = categoryInput.value;
    const description = descriptionInput.value.trim();

    if (!name || priceInput.value === "" || !Number.isFinite(price) || price < 0) {
        alert("Entre un nom et un prix valide en FCFA.");
        return;
    }

    const editingId = idInput.value;
    const existing = products.find(p => p.id === editingId);
    const item = {
        id: existing ? existing.id : (crypto.randomUUID ? crypto.randomUUID() : String(Date.now())),
        name,
        price,
        category,
        description,
        image: selectedImage || "",
        emoji: existing?.emoji || "👚"
    };

    if (existing && !selectedImage) item.image = existing.image || "";

    const previous = products;
    if (existing) {
        products = products.map(p => p.id === editingId ? item : p);
    } else {
        products.unshift(item);
    }

    if (!saveProducts()) {
        products = previous;
        return;
    }

    resetForm();
    renderProducts();
    document.getElementById("boutique").scrollIntoView({behavior:"smooth"});
});

cancelBtn.addEventListener("click", resetForm);
document.getElementById("search").addEventListener("input", renderProducts);
document.getElementById("filter").addEventListener("change", renderProducts);
document.getElementById("contactWhatsApp").href =
    `https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent("Bonjour HB Fashion Store, je souhaite avoir des informations sur vos articles.")}`;
document.getElementById("year").textContent = new Date().getFullYear();

renderProducts();
</script>
</body>
</html>