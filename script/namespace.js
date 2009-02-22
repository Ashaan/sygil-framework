function registerNamespace(namespace) {
    var namespaceParts = namespace.split(".");
    var root = window;

    for (var i=0; i<namespaceParts.length; i++) {
        if (typeof root[namespaceParts[i]] == "undefined")
            root[namespaceParts[i]] = new Object();

        root = root[namespaceParts[i]];
    }
}

