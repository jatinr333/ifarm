#!/usr/bin/env python3
"""
Add a new daily journal entry to data/journals.json.

Usage (interactive):
    python3 add-entry.py

Usage (non-interactive):
    python3 add-entry.py --title "My title" --category "Horticulture" \
        --summary "One-line summary" --content "Full text..." --tags mango,ipm

Defaults the date to today; pass --date YYYY-MM-DD to override.
"""
import argparse
import json
import re
import sys
from datetime import date
from pathlib import Path

DATA = Path(__file__).parent / "data" / "journals.json"


def slugify(text: str) -> str:
    return re.sub(r"[^a-z0-9]+", "-", text.lower()).strip("-")[:60]


def prompt(label: str, default: str = "", required: bool = False) -> str:
    while True:
        value = input(f"{label}{f' [{default}]' if default else ''}: ").strip() or default
        if value or not required:
            return value
        print("  This field is required.")


def main() -> int:
    ap = argparse.ArgumentParser(description=__doc__, formatter_class=argparse.RawDescriptionHelpFormatter)
    ap.add_argument("--title")
    ap.add_argument("--category")
    ap.add_argument("--summary")
    ap.add_argument("--content")
    ap.add_argument("--tags", help="comma separated")
    ap.add_argument("--date", default=date.today().isoformat())
    ap.add_argument("--reading-time", type=int)
    ap.add_argument("--pdf", default="")
    ap.add_argument("--featured", action="store_true")
    args = ap.parse_args()

    data = json.loads(DATA.read_text(encoding="utf-8"))
    interactive = not args.title

    title = args.title or prompt("Title", required=True)
    category = args.category or prompt("Category", default="Agricultural Sciences")
    summary = args.summary or prompt("Summary (one or two sentences)", required=True)
    if args.content is not None:
        content = args.content
    elif interactive:
        print("Content (finish with an empty line):")
        lines = []
        while True:
            line = sys.stdin.readline().rstrip("\n")
            if line == "":
                break
            lines.append(line)
        content = "\n\n".join(lines) or summary
    else:
        content = summary
    tags = [t.strip() for t in (args.tags or (prompt("Tags (comma separated)") if interactive else "")).split(",") if t.strip()]
    reading_time = args.reading_time or max(1, round(len(content.split()) / 200))

    entry_id = f"{args.date}-{slugify(title)}"
    if any(e["id"] == entry_id for e in data["entries"]):
        print(f"Entry {entry_id} already exists.", file=sys.stderr)
        return 1

    data["entries"].insert(0, {
        "id": entry_id,
        "date": args.date,
        "title": title,
        "category": category,
        "tags": tags,
        "summary": summary,
        "content": content,
        "readingTime": reading_time,
        "featured": args.featured,
        "pdf": args.pdf,
    })
    data["entries"].sort(key=lambda e: e["date"], reverse=True)
    DATA.write_text(json.dumps(data, indent=2, ensure_ascii=False) + "\n", encoding="utf-8")
    print(f"Added '{title}' for {args.date} -> {DATA}")
    return 0


if __name__ == "__main__":
    sys.exit(main())
