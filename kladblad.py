import matplotlib.pyplot as plt
import networkx as nx

def draw_oxygen_hydration():
    G = nx.Graph()
    
    pos = {
        "O2-": (0, 0),
        "H2O (1)": (-1, 1),
        "H2O (2)": (1, 1),
        "H2O (3)": (-1, -1),
        "H2O (4)": (1, -1)
    }

    edges = [("O2-", "H2O (1)"), ("O2-", "H2O (2)"), ("O2-", "H2O (3)"), ("O2-", "H2O (4)")]
    
    G.add_edges_from(edges)
    
    plt.figure(figsize=(5,5))
    nx.draw(G, pos, with_labels=True, node_color="lightblue", edge_color="gray", node_size=3000, font_size=10)
    plt.title("Zuurstofion omgeven door vier watermoleculen")
    plt.show()

# Roep de functie aan
draw_oxygen_hydration()