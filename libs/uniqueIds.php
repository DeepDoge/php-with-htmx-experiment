<?
class UniqueIdStore
{
    private $keyIdMap = [];

    public function __get($key)
    {
        // Check if an ID is already memoized for the key
        if (isset($this->keyIdMap[$key])) {
            return $this->keyIdMap[$key];
        }

        // Generate a unique random ID for the key
        $uniqueId = uniqid($key);

        // Memoize (cache) the ID for the key
        $this->keyIdMap[$key] = $uniqueId;

        return $uniqueId;
    }
}
