window.onload = () => {
    try {
        main.style.marginTop = navbarHeader.offsetHeight + "px";
    } catch (error) {
        console.log(`O elemento main não está definido - ${error.message}`);
    }
}